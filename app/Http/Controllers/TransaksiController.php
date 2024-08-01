<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\Inventori;
use App\Models\MetodePembayaran;
use App\Models\Produk;
use App\Models\ProdukInventori;
use App\Models\TransaksiInventori;
use App\Models\TransaksiProduk;
use App\Models\TransaksiProdukTemp;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Pdf;
use PHPUnit\Framework\MockObject\Rule\InvocationOrder;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    function __construct()
    {
        // $this->middleware('admin');

    }


    public function index()
    {

        $filter = request(['search', 'status', 'tanggal']);


        $data = Transaksi::filter($filter)->orderBy('id', 'desc')->paginate(show());
        $summary = Transaksi::selectRaw('SUM(total_harga) as total_omset, (SUM(total_harga) - SUM(administrasi) - SUM(diskon)) as omset_bersih, (select sum(total_harga) from transaksi where metode_id = 1 and tanggal like "%' . date('Y-m-d') . '%") as total_cash,
        (select sum(total_harga) - SUM(administrasi) from transaksi where metode_id = 2 and tanggal like "%' . date('Y-m-d') . '%") as total_qris')
            ->where('tanggal', date('Y-m-d'))->first();
        // dd($subtotal);


        return view('transaksi.index')->with([
            'title' => 'Transaksi',
            'data' => $data,
            'omset' => $summary->total_omset,
            'omsetBersih' => $summary->omset_bersih,
            'cash' => $summary->total_cash,
            'qris' => $summary->total_qris,
        ]);
    }

    public function item($id)
    {
        $data = TransaksiProduk::where('transaksi_id', $id)->get();
        $transaksi = Transaksi::find($id);
        return view('transaksi.item')->with([
            'title' => 'Item',
            'data' => $data,
            'transaksi' => $transaksi


        ]);
    }


    public function create()
    {
        $data = TransaksiProdukTemp::get();

        $jumlahItem =  TransaksiProdukTemp::count();

        $subtotal = TransaksiProdukTemp::selectRaw('SUM(jumlah * harga) as subtotal')->first();
        $subtotal = $subtotal->subtotal;



        $transaksiProduk = TransaksiProdukTemp::where('metode_id', '>', 0)->first();
        if (!empty($transaksiProduk)) {
            $metodeId = $transaksiProduk->metode_id;
        } else {
            $metodeId = 0;
        }

        return view('transaksi.create')->with([
            'title' => 'Transaksi',
            'data' => $data,
            'produk' => Produk::orderBy('nama_produk')->get(),
            'metode' => MetodePembayaran::get(),
            'jumlahItem' =>  $jumlahItem,
            'subtotal' => $subtotal,
            'exist' => TransaksiProdukTemp::exists(),
            'pembayaran' =>  TransaksiProdukTemp::where('metode_id', '>', 0)->exists(),
            'metodeId' =>  $metodeId

        ]);
    }


    public function storeItemTemp(Request $request)
    {
        $data = $request->all();
        if ($data['barcode'] != null) {
            $barcode = $data['barcode'];
        } else if ($data['produk'] != null) {
            $barcode = $data['produk'];
        } else {
            return back()->with('fail', 'Invalid Input');
        }

        $cekBarcode =  Produk::where('barcode', $barcode)->exists();
        if ($cekBarcode == false) {
            return back()->with('fail', 'Invalid Barcode');
        }

        $cekMetodePembayaran = TransaksiProdukTemp::whereNotNull('metode_id')->first();


        if ($cekMetodePembayaran) {
            $metodeId = $cekMetodePembayaran->metode_id;
        } else {
            $metodeId = null;
        }

        $cekExistProduk = TransaksiProdukTemp::where('barcode', $barcode)->exists();
        if ($cekExistProduk) {
            $transaksiTemp = TransaksiProdukTemp::where('barcode', $barcode)->first();
            $jumlah = $transaksiTemp->jumlah + 1;
            $produk = Produk::where('barcode', $barcode)->first();



            $cekStok =  $produk->jumlah_stok - $transaksiTemp->jumlah;

            if ($cekStok <= 0) {
                return back()->with('fail', 'Stok habis');
            }

            $data['barcode'] = $produk->barcode;
            $data['produk'] =  $produk->nama_produk;
            $data['harga'] = $produk->harga_jual;
            $data['jumlah'] = $jumlah;
            $data['produk_id'] = $produk->id;
            $data['metode_id'] = $metodeId;
            TransaksiProdukTemp::find($transaksiTemp->id)->fill($data)->save();

            return back()->with('success', 'Data berhasil Diubah');
        } else {
            $jumlah = 1;
            $produk = Produk::where('barcode', $barcode)->first();

            if ($produk->jumlah_stok <= 0) {
                return back()->with('fail', 'Stok habis');
            }
            $data['barcode'] = $produk->barcode;
            $data['produk'] =  $produk->nama_produk;
            $data['harga'] = $produk->harga_jual;
            $data['jumlah'] = $jumlah;
            $data['produk_id'] = $produk->id;
            $data['metode_id'] = $metodeId;


            TransaksiProdukTemp::create($data);
            return back()->with('success', 'Data berhasil ditambah');
        }
    }

    public function updateItemTemp(Request $request, TransaksiProdukTemp $transaksiProdukTemp, $id)
    {

        $data = $request->all();
        // dd($data);
        $transaksiProdukTemp->find($id)->fill($data)->save();
        return back()->with('success', 'Data berhasil diubah');
    }


    public function updateMetodePembayaran($id)
    {

        $produk =  TransaksiProdukTemp::exists();
        if ($produk) {

            $dataProduk = [
                'metode_id' => $id
            ];
            TransaksiProdukTemp::where('id', '>', 0)->update($dataProduk);
            $data = true;
        } else {
            $data = false;
        }

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }
    public function destroyItemTemp(TransaksiProdukTemp $transaksiProdukTemp, $id)
    {
        $transaksiProdukTemp->find(crypt_open($id))->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }


    public function storeItemTempByBarcode(Request $request, $barcode)
    {

        // if ($barcode != null) {
        //     $barcode = $data['barcode'];
        // } else if ($data['produk'] != null) {
        //     $barcode = $data['produk'];
        // } else {
        //     return back()->with('fail', 'Invalid Input');
        // }

        $cekBarcode =  Produk::where('barcode', $barcode)->exists();
        if ($cekBarcode == false) {
            message('fail', 'Barcode tidak ditemukan');
            return response()->json([
                'status' => 'error',
                'message' => 'Barcode tidak ditemukan'
            ]);
        }


        $cekMetodePembayaran = TransaksiProdukTemp::whereNotNull('metode_id')->first();
        if ($cekMetodePembayaran) {
            $metodeId = $cekMetodePembayaran->metode_id;
        } else {
            $metodeId = null;
        }


        $cekExistProduk = TransaksiProdukTemp::where('barcode', $barcode)->exists();
        if ($cekExistProduk) {
            $transaksiTemp = TransaksiProdukTemp::where('barcode', $barcode)->first();
            $jumlah = $transaksiTemp->jumlah + 1;
            // dd($jumlah);
            $produk = Produk::where('barcode', $barcode)->first();





            $cekStok =  $produk->jumlah_stok - $transaksiTemp->jumlah;
            if ($cekStok <= 0) {
                message('fail', 'Stok habis');
                return response()->json([
                    'status' => 'error',
                    'message' => 'Stok produk habis'
                ]);
            }

            $data['barcode'] = $produk->barcode;
            $data['produk'] =  $produk->nama_produk;
            $data['harga'] = $produk->harga_jual;
            $data['jumlah'] =  $jumlah;
            $data['produk_id'] = $produk->id;
            $data['metode_id'] = $metodeId;


            TransaksiProdukTemp::find($transaksiTemp->id)->fill($data)->save();
            message('success', 'Data berhasil ditambah');
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil ditambah'
            ]);

            // message('success', 'Data berhasil ditambah');
            // return redirect('transaksi/create')->with('success', 'Data berhasil ditambah');
        } else {
            $jumlah = 1;
            $produk = Produk::where('barcode', $barcode)->first();


            if ($produk->jumlah_stok <= 0) {
                message('fail', 'Stok habis');
                return response()->json([
                    'status' => 'error',
                    'message' => 'Stok produk habis'
                ]);
            }
            $data['barcode'] = $produk->barcode;
            $data['produk'] =  $produk->nama_produk;
            $data['harga'] = $produk->harga_jual;
            $data['jumlah'] = $jumlah;
            $data['produk_id'] = $produk->id;
            $data['metode_id'] = $metodeId;

            TransaksiProdukTemp::create($data);
            message('success', 'Data berhasil ditambah');

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil ditambah'
            ]);
            // return redirect('transaksi/create')->with('success', 'Data berhasil ditambah');
        }

        return response()->json([
            'status' => 'success',
            'data' => $barcode
        ]);
    }

    public function createTempByBarcodeScanner(Request $request, $barcode)
    {

        // if ($barcode != null) {
        //     $barcode = $data['barcode'];
        // } else if ($data['produk'] != null) {
        //     $barcode = $data['produk'];
        // } else {
        //     return back()->with('fail', 'Invalid Input');
        // }

        $cekBarcode =  Produk::where('barcode', $barcode)->exists();
        if ($cekBarcode == false) {
            message('fail', 'Barcode tidak ditemukan');
            return response()->json([
                'status' => 'error',
                'message' => 'Barcode tidak ditemukan'
            ]);
        }


        // $cekMetodePembayaran = TransaksiProdukTemp::whereNotNull('metode_id')->first();
        // if ($cekMetodePembayaran) {
        //     $metodeId = $cekMetodePembayaran->metode_id;
        // } else {
        //     $metodeId = null;
        // }


        $cekExistProduk = TransaksiProdukTemp::where('barcode', $barcode)->exists();
        if ($cekExistProduk) {
            $transaksiTemp = TransaksiProdukTemp::where('barcode', $barcode)->first();
            $jumlah = $transaksiTemp->jumlah;
            // dd($jumlah);
            $produk = Produk::where('barcode', $barcode)->first();





            $cekStok =  $produk->jumlah_stok - $transaksiTemp->jumlah;
            if ($cekStok <= 0) {
                message('fail', 'Stok habis');
                return response()->json([
                    'status' => 'error',
                    'message' => 'Stok produk habis'
                ]);
            }

            $data['barcode'] = $produk->barcode;
            $data['produk'] =  $produk->nama_produk;
            $data['harga'] = $produk->harga_jual;
            $data['jumlah'] =  $jumlah;
            $data['produk_id'] = $produk->id;
            // $data['metode_id'] = $metodeId;


            TransaksiProdukTemp::find($transaksiTemp->id)->fill($data)->save();
            message('success', 'Data berhasil ditambah');
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil ditambah'
            ]);

            // message('success', 'Data berhasil ditambah');
            // return redirect('transaksi/create')->with('success', 'Data berhasil ditambah');
        } else {
            $jumlah = 1;
            $produk = Produk::where('barcode', $barcode)->first();


            if ($produk->jumlah_stok <= 0) {
                message('fail', 'Stok habis');
                return response()->json([
                    'status' => 'error',
                    'message' => 'Stok produk habis'
                ]);
            }
            $data['barcode'] = $produk->barcode;
            $data['produk'] =  $produk->nama_produk;
            $data['harga'] = $produk->harga_jual;
            $data['jumlah'] = $jumlah;
            $data['produk_id'] = $produk->id;
            // $data['metode_id'] = $metodeId;

            TransaksiProdukTemp::create($data);
            message('success', 'Data berhasil ditambah');

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil ditambah'
            ]);
            // return redirect('transaksi/create')->with('success', 'Data berhasil ditambah');
        }

        return response()->json([
            'status' => 'success',
            'data' => $barcode
        ]);
    }



    public function save(Request $request)
    {


        // dd($request->all());
        $jumlahItem =  TransaksiProdukTemp::count();
        $subtotal = TransaksiProdukTemp::selectRaw('SUM(jumlah * harga) as subtotal,metode_id')->groupBy('metode_id')->first();


        // $produk = TransaksiProdukTemp::select('metode_id')->groupBy('metode_id')->first();
        // $metodeId = $produk->metode_id;

        $metode = MetodePembayaran::find($request->metode_pembayaran);
        $administrasi = $metode->potongan;


        // $harga = (int)($subtotal->subtotal - ($subtotal->subtotal * ($administrasi / 100)));
        $diskon = $request->diskon;
        $administrasi =  (int)($subtotal->subtotal * ($administrasi / 100));
        // dd($administrasi);

        // dd()

        $jumlahItem =  TransaksiProdukTemp::count();
        $dataTransaksi['tanggal'] = date('Y-m-d');
        $dataTransaksi['jumlah_item'] =  $jumlahItem;
        $dataTransaksi['total_harga'] =  $subtotal->subtotal;
        $dataTransaksi['invoice'] = strtoupper(uniqid());
        $dataTransaksi['user_id'] = userId();
        $dataTransaksi['metode_id'] =  $metode->id;
        $dataTransaksi['diskon'] =     $diskon;
        $dataTransaksi['administrasi'] =    $administrasi;


        Transaksi::create($dataTransaksi);


        $transaksi = Transaksi::latest()->first();
        $produk =  TransaksiProdukTemp::all();
        foreach ($produk as $row) {
            $this->storeKurangStok($row->produk_id, $row->jumlah, $transaksi->id);
            // $potonganHarga = $row->harga * ($potongan / 100);
            // $harga =  $row->harga - $potonganHarga;
            $data['barcode'] = $row->barcode;
            $data['produk'] =  $row->produk;
            $data['harga'] =  $row->harga;
            $data['jumlah'] = $row->jumlah;
            $data['produk_id'] = $row->produk_id;
            $data['transaksi_id'] = $transaksi->id;
            TransaksiProduk::create($data);

            $hargaBeli[] = $this->getHargaBeli($row->produk_id, $row->jumlah);
        }


        $belanja =  DB::table('saldo_belanja')->where('id', 1)->first();

        $saldo = $belanja->saldo;
        $saldoAkhir = $saldo + array_sum($hargaBeli);
        $dataSaldo = [
            'saldo'  => $saldoAkhir
        ];



        DB::table('saldo_belanja')->where('id', 1)->update($dataSaldo);


        TransaksiProdukTemp::truncate();
        return back()->with('success', 'Transaksi berhasil disimpan ');
    }

    public function getHargaBeli($produkId, $jumlah)
    {
        $produk =  ProdukInventori::where('produk_id', $produkId)->orderBy('updated_at', 'desc')->first();
        $hargaBeli = $produk->harga_beli;
        return   $total = $jumlah * $hargaBeli;
    }


    public function storeKurangStok($produkId, $jumlahDijual, $transaksiId)
    {


        // dd($produkId, $jumlahDijual, $transaksiId);
        $produk = Produk::find($produkId);
        $stokTersedia = $produk->jumlah_stok;

        $produkInventori = ProdukInventori::selectRaw('SUM(jumlah_stok) as stok_tersedia')->where('produk_id', $produkId)->first();


        $stok =  $produkInventori->stok_tersedia;



        if ($stok <= 0) {
            return back()->with('fail', 'Stok habis cuy');
        } else if ($jumlahDijual > $stok) {
            return back()->with('fail', 'Stok diambil melebihi stok tersedia');
        }

        $produkInventori = ProdukInventori::where('produk_id', $produk->id)
            ->where('jumlah_stok', '>=', $jumlahDijual)
            ->first();

        if (empty($produkInventori)) {


            $produkInventori = ProdukInventori::where('produk_id', $produk->id)
                ->where('jumlah_stok', '!=', 0)
                ->get();


            $stokDiambil = $jumlahDijual;
            foreach ($produkInventori as  $row) {

                if ($stokDiambil > 0) {

                    if ($stokDiambil >= $row->jumlah_stok) {

                        $dataProdukInventori = [
                            'jumlah_stok' =>  0
                        ];

                        ProdukInventori::find($row->id)->fill($dataProdukInventori)->save();
                        $stokDiambil =  $stokDiambil - $row->jumlah_stok;


                        $totalStokInventori =  $stokDiambil;
                        $namaProduk = strtoupper($produk->nama_produk);
                        $jumlah =  $row->jumlah_stok;
                        $harga = $row->harga_beli;

                        $tanggal = formatTanggal(timestamp());
                        $jam = formatJam(timestamp());



                        $keterangan = 'Penjualan produk ' . $namaProduk . ', jumlah ' . $jumlah . ' pcs, harga ' . $harga .
                            ' pada tanggal ' . $tanggal . ' ' .   $jam;
                        $dataInventori = [
                            'stok_in' => 0,
                            'stok_out' => $row->jumlah_stok,
                            'total_stok' => $totalStokInventori,
                            'type' => 'out',
                            'produk_id' => $produkId,
                            'supplier_id' => null,
                            'transaksi_id' => $transaksiId,
                            'keterangan' =>  $keterangan
                        ];

                        Inventori::create($dataInventori);

                        $dataTransaksiInventori = [

                            'jumlah' =>   $jumlah,
                            'harga' =>   $harga,
                            'transaksi_id' => $transaksiId,
                            'produk_id' => $produkId,
                            'produkInventori_id' =>  $row->id
                        ];
                        TransaksiInventori::create($dataTransaksiInventori);
                    } else if ($stokDiambil < $row->jumlah_stok) {
                        $sisaStokProdukInventori =  $row->jumlah_stok - $stokDiambil;
                        $stokDijual = $stokDiambil;

                        $dataProdukInventori = [
                            'jumlah_stok' =>   $sisaStokProdukInventori
                        ];

                        ProdukInventori::find($row->id)->fill($dataProdukInventori)->save();

                        $stokDiambil =  $stokDiambil - $row->jumlah_stok;



                        $totalStokInventori =  $sisaStokProdukInventori;
                        $namaProduk = strtoupper($produk->nama_produk);
                        $jumlah =  $stokDijual;
                        $harga = $row->harga_beli;

                        $tanggal = formatTanggal(timestamp());
                        $jam = formatJam(timestamp());



                        $keterangan = 'Penjualan produk ' . $namaProduk . ', jumlah ' . $jumlah . ' pcs, harga ' . $harga .
                            ' pada tanggal ' . $tanggal . ' ' .   $jam;
                        $dataInventori = [
                            'stok_in' => 0,
                            'stok_out' => $stokDijual,
                            'total_stok' => $totalStokInventori,
                            'type' => 'out',
                            'produk_id' => $produkId,
                            'supplier_id' => null,
                            'transaksi_id' => $transaksiId,
                            'keterangan' =>  $keterangan
                        ];

                        Inventori::create($dataInventori);


                        $dataTransaksiInventori = [

                            'jumlah' =>   $jumlah,
                            'harga' =>   $harga,
                            'transaksi_id' => $transaksiId,
                            'produk_id' => $produkId,
                            'produkInventori_id' =>  $row->id
                        ];
                        TransaksiInventori::create($dataTransaksiInventori);
                    }
                }
            }
        } else {
            $jumlahStokProdukInventori = $produkInventori->jumlah_stok;
            $idProdukInventori = $produkInventori->id;
            $sisaStokProdukInventori =  $jumlahStokProdukInventori - $jumlahDijual;
            $dataProdukInventori = [
                'jumlah_stok' =>  $sisaStokProdukInventori
            ];

            ProdukInventori::find($idProdukInventori)->fill($dataProdukInventori)->save();


            $totalStokInventori =  $stokTersedia - $jumlahDijual;
            $namaProduk = strtoupper($produk->nama_produk);
            $jumlah =  $jumlahDijual;
            $harga = $produkInventori->harga_beli;

            $tanggal = formatTanggal(timestamp());
            $jam = formatJam(timestamp());



            $keterangan = 'Penjualan produk ' . $namaProduk . ', jumlah ' . $jumlah . ' pcs, harga ' . $harga .
                ' pada tanggal ' . $tanggal . ' ' .   $jam;
            $dataInventori = [
                'stok_in' => 0,
                'stok_out' => $jumlahDijual,
                'total_stok' => $totalStokInventori,
                'type' => 'out',
                'produk_id' => $produkId,
                'supplier_id' => null,
                'transaksi_id' => $transaksiId,
                'keterangan' =>  $keterangan
            ];

            Inventori::create($dataInventori);


            $dataTransaksiInventori = [

                'jumlah' =>   $jumlah,
                'harga' =>   $harga,
                'transaksi_id' => $transaksiId,
                'produk_id' => $produkId,
                'produkInventori_id' =>  $produkInventori->id
            ];
            TransaksiInventori::create($dataTransaksiInventori);
        }



        $sisaStokProduk = $produk->jumlah_stok - $jumlahDijual;

        $dataProduk = [
            'jumlah_stok' =>     $sisaStokProduk
        ];
        Produk::find($produkId)->fill($dataProduk)->save();




        // return back()->with('success', 'Data berhasil diubah');
    }

    public function reset()
    {
        TransaksiProdukTemp::truncate();
        return back()->with('success', 'Transaksi berhasil direset');
    }



    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }










    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
