<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\Inventori;
use App\Models\ProdukInventori;
use App\Models\ProdukKategori;
use App\Models\ProdukSupplierHistory;
use App\Models\Supplier;
use App\Models\SupplierProduk;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filter = request(['search', 'produk', 'kategori']);
        $data = Produk::filter($filter)->orderBy('kategori_id')->paginate(show());

        return view('produk.index')->with([
            'title' => 'Produk',
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = ProdukKategori::where('is_active', 'Y')->get();
        $supplier = Supplier::where('is_active', 'Y')->get();
        return view('produk.createNew')->with([
            'title' => 'Produk',
            'kategori' => $kategori,
            'supplier' => $supplier,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Produk $produk, Request  $request)
    {
        $data = $request->all();

        //kelola Produk 
        $request->stok_tersedia;
        $dataProduk = [
            'nama_produk' => $request->nama_produk,
            'barcode' => $request->barcode,
            'harga_jual' => $request->harga_jual,
            'jumlah_stok' => $request->jumlah_stok,
            'kategori_id' => $request->kategori_id,
        ];


        Produk::create($dataProduk);

        $produk = Produk::latest()->first();
        //kelola Produk Inventori

        $dataInventori = [
            'harga_beli' => $request->harga_beli,
            'jumlah_stok' => $request->jumlah_stok,
            'produk_id' => $produk->id
        ];
        ProdukInventori::create($dataInventori);




        //kelola supplier

        $supplierLama = $request->supplier_lama;
        $supplierBaru = $request->supplier_baru;


        if (empty($supplierBaru) && !empty($supplierLama)) {

            $supplier = Supplier::find($request->supplier_lama);

            $dataSupplierProduk = [
                'harga_beli' => $request->harga_beli,
                'harga_last_update' => timestamp(),
                'produk_id' => $produk->id,
                'supplier_id' => $supplier->id
            ];
            SupplierProduk::create($dataSupplierProduk);




            $dataSupplierProdukHistory = [
                'harga_beli' => $request->harga_beli,
                'stok' => $request->jumlah_stok,
                'produk_id' => $produk->id,
                'supplier_id' => $supplier->id
            ];

            ProdukSupplierHistory::create($dataSupplierProdukHistory);



            $namaProduk = strtoupper($produk->nama_produk);
            $jumlah =  $request->jumlah_stok;
            $harga = money($request->harga_beli);
            $namaSupplier =  strtoupper($supplier->nama_supplier);
            $tanggal = formatTanggal(timestamp());
            $jam = formatJam(timestamp());


            $keterangan = 'Pembelian produk ' . $namaProduk . ', jumlah ' . $jumlah . ' pcs, harga ' . $harga . ',di supplier ' . $namaSupplier . ' pada tanggal ' . $tanggal . ' ' .   $jam;
            $dataInventori = [
                'stok_in' => $request->jumlah_stok,
                'stok_out' => 0,
                'total_stok' => $request->jumlah_stok,
                'type' => 'in',
                'produk_id' => $produk->id,
                'supplier_id' => $request->supplier_lama,
                'transaksi_id' => null,
                'keterangan' =>  $keterangan
            ];

            Inventori::create($dataInventori);
        } else if (!empty($supplierBaru) && empty($supplierLama)) {
            // echo "supplier baru tidak kosong tapi lama iya";


            $dataSupplier = [
                'nama_supplier' => $supplierBaru,
            ];

            Supplier::create($dataSupplier);

            $supplier =  Supplier::latest()->first();
            $supplierId = $supplier->id;

            $dataSupplierProduk = [
                'harga_beli' => $request->harga_beli,
                'harga_last_update' => timestamp(),
                'is_active' => 'Y',
                'produk_id' => $produk->id,
                'supplier_id' => $supplierId,
            ];
            SupplierProduk::create($dataSupplierProduk);

            $dataSupplierProdukHistory = [
                'harga_beli' => $request->harga_beli,
                'stok' => $request->jumlah_stok,
                'produk_id' => $produk->id,
                'supplier_id' => $supplierId
            ];

            ProdukSupplierHistory::create($dataSupplierProdukHistory);
            // $totalStokInventori =  $request->stok_tersedia + $request->stok_ditambah;
            $namaProduk = strtoupper($produk->nama_produk);
            $jumlah =  $request->jumlah_stok;
            $harga = money($request->harga_beli);
            $supplier =  strtoupper($supplier->nama_supplier);
            $tanggal = formatTanggal(timestamp());
            $jam = formatJam(timestamp());


            $keterangan = 'Pembelian produk ' . $namaProduk . ', jumlah ' . $jumlah . ' pcs, harga ' . $harga . ',di supplier ' . $supplier . ' pada tanggal ' . $tanggal . ' ' .   $jam;
            $dataInventori = [
                'stok_in' => $request->jumlah_stok,
                'stok_out' => 0,
                'total_stok' => $request->jumlah_stok,
                'type' => 'in',
                'produk_id' => $produk->id,
                'supplier_id' => $supplierId,
                'transaksi_id' => null,
                'keterangan' =>  $keterangan
            ];

            Inventori::create($dataInventori);
        } else {
            return back()->with('fail', 'Error !, Coba ulangi lagi');
        }


        return back()->with('success', 'Stok berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk, $id)
    {

        $data = $produk->find(crypt_open($id));

        $kategori = ProdukKategori::where('is_active', 'Y')->get();
        return view('produk.edit')->with([
            'title' => 'Produk',
            'data' => $data,
            'kategori' => $kategori,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukRequest $request, Produk $produk, $id)
    {
        $data = $request->all();
        $produk->find(crypt_open($id))->fill($data)->save();
        return back()->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk, $id)
    {
        $produk->find(crypt_open($id))->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }


    public function inventori(Produk $produk, $id)
    {

        $data = $produk->find(crypt_open($id));

        $kategori = ProdukKategori::where('is_active', 'Y')->get();
        return view('produk.inventori')->with([
            'title' => 'Produk',
            'data' => $data,
            'kategori' => $kategori,
        ]);
    }


    public function addStokById($id)
    {

        $produk = Produk::find(crypt_open($id));
        $kategori = ProdukKategori::where('is_active', 'Y')->get();

        $supplierProduk = SupplierProduk::where('produk_id', crypt_open($id))->get();

        foreach ($supplierProduk as $rowSupplierProduk) {
            // $result[] = implode(',', $rowSupplierProduk->id);
            $idSupplierProduk[] = $rowSupplierProduk->supplier_id;
        }

        // dd($idSupplierProduk);

        $supplier = Supplier::where('is_active', 'Y')
            ->whereNotIn('id', $idSupplierProduk)
            ->get();



        return view('produk.addStokById')->with([
            'title' => 'Tambah Stok',
            'kategori' => $kategori,
            'supplier' => $supplier,
            'produk' => $produk,

        ]);
    }




    public function addStokByBarcode(Produk $produk)
    {

        $kategori = ProdukKategori::where('is_active', 'Y')->get();
        $supplier = Supplier::where('is_active', 'Y')->get();
        return view('produk.addStokByBarcode')->with([
            'title' => 'Tambah Stok'
        ]);
    }

    public function storeStok(Request $request)
    {



        // DB::beginTransaction();

        // try {




        if ($request->stok_ditambah < 1) {
            return back()->with('fail', 'Gagal, Stok minimal 1 pcs');
        }
        if ($request->harga_beli < 1) {
            return back()->with('fail', 'Gagal, Harga tidak boleh 0');
        }

        $produk = Produk::find($request->produk_id);


        //kelola Produk 
        $totalStok = $request->stok_tersedia + $request->stok_ditambah;
        $dataProduk = [
            'jumlah_stok' => $totalStok
        ];
        Produk::find($request->produk_id)->fill($dataProduk)->save();

        //kelola Produk Inventori
        $inventori =   ProdukInventori::where('produk_id', $request->produk_id)
            ->where('harga_beli', $request->harga_beli)
            ->first();
        if (!empty($inventori)) {
            $totalStok = $inventori->jumlah_stok + $request->stok_ditambah;
            $dataInventori = [
                'jumlah_stok' => $totalStok
            ];
            ProdukInventori::find($inventori->id)->fill($dataInventori)->save();
        } else {
            $dataInventori = [
                'harga_beli' => $request->harga_beli,
                'jumlah_stok' => $request->stok_ditambah,
                'produk_id' => $request->produk_id
            ];
            ProdukInventori::create($dataInventori);
        }


        //kelola supplier

        $supplierLama = $request->supplier_lama;
        $supplierDatabase = $request->supplier_database;
        $supplierBaru = $request->supplier_baru;

        // dd($supplierLama, $supplierDatabase, $supplierBaru);
        // $supplierLama = null;
        // $supplierBaru = 'Riko';


        if (empty($supplierBaru) &&  empty($supplierDatabase) && !empty($supplierLama)) {
            // supplier database kosong
            // supplier baru kosong
            $supplierProduk = SupplierProduk::where('supplier_id', $request->supplier_lama)->first();

            $dataSupplierProduk = [
                'harga_beli' => $request->harga_beli,
                'harga_last_update' => timestamp()
            ];
            SupplierProduk::find($supplierProduk->id)->fill($dataSupplierProduk)->save();


            $dataSupplierProdukHistory = [
                'harga_beli' => $request->harga_beli,
                'stok' => $request->stok_ditambah,
                'produk_id' => $request->produk_id,
                'supplier_id' => $request->supplier_lama
            ];

            ProdukSupplierHistory::create($dataSupplierProdukHistory);


            $supplier = Supplier::find($request->supplier_lama);

            $totalStokInventori =  $request->stok_tersedia + $request->stok_ditambah;
            $namaProduk = strtoupper($produk->nama_produk);
            $jumlah =  $request->stok_ditambah;
            $harga = money($request->harga_beli);
            $supplier =  strtoupper($supplier->nama_supplier);
            $tanggal = formatTanggal(timestamp());
            $jam = formatJam(timestamp());


            $keterangan = 'Pembelian produk ' . $namaProduk . ', jumlah ' . $jumlah . ' pcs, harga ' . $harga . ',di supplier ' . $supplier . ' pada tanggal ' . $tanggal . ' ' .   $jam;
            $dataInventori = [
                'stok_in' => $request->stok_ditambah,
                'stok_out' => 0,
                'total_stok' => $totalStokInventori,
                'type' => 'in',
                'produk_id' => $request->produk_id,
                'supplier_id' => $request->supplier_lama,
                'transaksi_id' => null,
                'keterangan' =>  $keterangan
            ];

            Inventori::create($dataInventori);
        } else if (!empty($supplierBaru) && empty($supplierDatabase) && empty($supplierLama)) {

            $dataSupplier = [
                'nama_supplier' => $supplierBaru,
            ];

            Supplier::create($dataSupplier);

            $supplier =  Supplier::latest()->first();
            $supplierId = $supplier->id;

            $dataSupplierProduk = [
                'harga_beli' => $request->harga_beli,
                'harga_last_update' => timestamp(),
                'is_active' => 'Y',
                'produk_id' => $request->produk_id,
                'supplier_id' => $supplierId,
            ];
            SupplierProduk::create($dataSupplierProduk);

            $dataSupplierProdukHistory = [
                'harga_beli' => $request->harga_beli,
                'stok' => $request->stok_ditambah,
                'produk_id' => $request->produk_id,
                'supplier_id' => $supplierId
            ];

            ProdukSupplierHistory::create($dataSupplierProdukHistory);
            $totalStokInventori =  $request->stok_tersedia + $request->stok_ditambah;
            $namaProduk = strtoupper($produk->nama_produk);
            $jumlah =  $request->stok_ditambah;
            $harga = money($request->harga_beli);
            $supplier =  strtoupper($supplier->nama_supplier);
            $tanggal = formatTanggal(timestamp());
            $jam = formatJam(timestamp());


            $keterangan = 'Pembelian produk ' . $namaProduk . ', jumlah ' . $jumlah . ' pcs, harga ' . $harga . ',di supplier ' . $supplier . ' pada tanggal ' . $tanggal . ' ' .   $jam;
            $dataInventori = [
                'stok_in' => $request->stok_ditambah,
                'stok_out' => 0,
                'total_stok' => $totalStokInventori,
                'type' => 'in',
                'produk_id' => $request->produk_id,
                'supplier_id' => $supplierId,
                'transaksi_id' => null,
                'keterangan' =>  $keterangan
            ];

            Inventori::create($dataInventori);
            // }
        } else if (empty($supplierBaru) && !empty($supplierDatabase) && empty($supplierLama)) {
            // $supplierProduk = SupplierProduk::where('supplier_id', $request->supplier_database)->first();

            $supplier = Supplier::find($request->supplier_database);
            $supplierId = $supplier->id;
            $dataSupplierProduk = [
                'harga_beli' => $request->harga_beli,
                'harga_last_update' => timestamp(),
                'is_active' => 'Y',
                'produk_id' => $request->produk_id,
                'supplier_id' =>  $supplierId,
            ];
            SupplierProduk::create($dataSupplierProduk);

            $dataSupplierProdukHistory = [
                'harga_beli' => $request->harga_beli,
                'stok' => $request->stok_ditambah,
                'produk_id' => $request->produk_id,
                'supplier_id' =>  $supplierId
            ];

            ProdukSupplierHistory::create($dataSupplierProdukHistory);

            $totalStokInventori =  $request->stok_tersedia + $request->stok_ditambah;
            $namaProduk = strtoupper($produk->nama_produk);
            $jumlah =  $request->stok_ditambah;
            $harga = money($request->harga_beli);
            $supplier =  strtoupper($supplier->nama_supplier);
            $tanggal = formatTanggal(timestamp());
            $jam = formatJam(timestamp());


            $keterangan = 'Pembelian produk ' . $namaProduk . ', jumlah ' . $jumlah . ' pcs, harga ' . $harga . ',di supplier ' . $supplier . ' pada tanggal ' . $tanggal . ' ' .   $jam;
            $dataInventori = [
                'stok_in' => $request->stok_ditambah,
                'stok_out' => 0,
                'total_stok' => $totalStokInventori,
                'type' => 'in',
                'produk_id' => $request->produk_id,
                'supplier_id' => $supplierId,
                'transaksi_id' => null,
                'keterangan' =>  $keterangan
            ];

            Inventori::create($dataInventori);
        } else {
            return back()->with('fail', 'Error !, Coba ulangi lagi');
        }


        return   back()->with('success', 'Stok berhasil ditambah');
        // } catch (\Throwable $th) {
        //     DB::rollback();
        //     return back()->with('fail', 'Something Went Wrong!');
        // }
    }

    public function addStock(Produk $produk, $id)
    {

        $kategori = ProdukKategori::where('is_active', 'Y')->get();
        $supplier = Supplier::where('is_active', 'Y')->get();
        return view('produk.create')->with([
            'title' => 'Tambah Stok',
            'kategori' => $kategori,
            'supplier' => $supplier,
        ]);

        // $data = $produk->find(crypt_open($id));

        // $kategori = ProdukKategori::where('is_active', 'Y')->get();
        // return view('produk.inventori')->with([
        //     'title' => 'Produk',
        //     'data' => $data,
        //     'kategori' => $kategori,
        // ]);
    }

    // Controller for json output using jquery



    public function getProdukByBarcode($barcode)
    {
        $cekExistProduk = Produk::where('barcode', $barcode)->exists();
        if (!$cekExistProduk) {
            return response()->json([
                'status' => 'error',
                'message' => 'produk not found'
            ]);
        }


        $produk = Produk::where('barcode', $barcode)->first();
        $kategori = ProdukKategori::find($produk->kategori_id);


        $produk['kategori'] = $kategori->kategori;

        $supplier = SupplierProduk::join('supplier', 'supplier.id', '=', 'supplier_id')
            ->where('produk_id', $produk->id)->get();

        return response()->json([
            'status' => 'success',
            'data' => [
                'produk' => $produk,
                'supplier' => $supplier
            ]
        ]);
    }





    public function hargaBeli(ProdukInventori $produkInventori, $id)
    {
        $data = $produkInventori->where('produk_id', crypt_open($id))->paginate(show());

        $produk = Produk::find(crypt_open($id));
        $kategori = ProdukKategori::find($produk->kategori_id);


        return view('produk_inventori.index')->with([
            'title' => 'Harga Beli',
            'data' => $data,
            'produk' => $produk,
            'kategori' => $kategori
        ]);
    }

    public function supplier(SupplierProduk $supplierProduk, $id)
    {
        $data = $supplierProduk->where('produk_id', crypt_open($id))->orderBy('harga_last_update', 'desc')->paginate(show());

        $produk = Produk::find(crypt_open($id));


        return view('produk.supplier')->with([
            'title' => 'Supplier',
            'data' => $data,
            'produk' => $produk,

        ]);
    }
    public function storeKurangStok(Request $request)
    {

        $produk = Produk::find($request->id);

        $produkInventori = ProdukInventori::selectRaw('SUM(jumlah_stok) as stok_tersedia')->where('produk_id', $produk->id)->first();


        $stok =  $produkInventori->stok_tersedia;



        if ($stok <= 0) {
            return back()->with('fail', 'Stok habis');
        } else if ($request->stok_diambil > $stok) {
            return back()->with('fail', 'Stok diambil melebihi stok tersedia');
        }

        $produkInventori = ProdukInventori::where('produk_id', $produk->id)
            ->where('jumlah_stok', '>=', $request->stok_diambil)
            ->first();

        if (empty($produkInventori)) {


            $produkInventori = ProdukInventori::where('produk_id', $produk->id)
                ->where('jumlah_stok', '!=', 0)
                ->get();


            $stokDiambil = $request->stok_diambil;
            foreach ($produkInventori as  $row) {

                if ($stokDiambil > 0) {

                    if ($stokDiambil >= $row->jumlah_stok) {

                        $dataProdukInventori = [
                            'jumlah_stok' =>  0
                        ];

                        ProdukInventori::find($row->id)->fill($dataProdukInventori)->save();
                        $stokDiambil =  $stokDiambil - $row->jumlah_stok;
                    } else if ($stokDiambil < $row->jumlah_stok) {
                        $sisaStokProdukInventori =  $row->jumlah_stok - $stokDiambil;

                        $dataProdukInventori = [
                            'jumlah_stok' =>   $sisaStokProdukInventori
                        ];

                        ProdukInventori::find($row->id)->fill($dataProdukInventori)->save();

                        $stokDiambil =  $stokDiambil - $row->jumlah_stok;
                    }
                }
            }
        } else {
            $jumlahStokProdukInventori = $produkInventori->jumlah_stok;
            $idProdukInventori = $produkInventori->id;
            $sisaStokProdukInventori =  $jumlahStokProdukInventori - $request->stok_diambil;
            $dataProdukInventori = [
                'jumlah_stok' =>  $sisaStokProdukInventori
            ];

            ProdukInventori::find($idProdukInventori)->fill($dataProdukInventori)->save();
        }



        $sisaStokProduk = $produk->jumlah_stok - $request->stok_diambil;

        $dataProduk = [
            'jumlah_stok' =>     $sisaStokProduk
        ];
        Produk::find($request->id)->fill($dataProduk)->save();



        $totalStokInventori =  $request->stok_tersedia - $request->stok_diambil;
        $namaProduk = strtoupper($produk->nama_produk);
        $jumlah =  $request->stok_diambil;
        $harga = money($request->harga_beli);

        $tanggal = formatTanggal(timestamp());
        $jam = formatJam(timestamp());



        $keterangan = 'Pengurangan produk ' . $namaProduk . ', jumlah ' . $jumlah . ' pcs, harga ' . $harga .
            ' pada tanggal ' . $tanggal . ' ' .   $jam . ' -  (' . $request->keterangan . ')';
        $dataInventori = [
            'stok_in' => 0,
            'stok_out' => $request->stok_diambil,
            'total_stok' => $totalStokInventori,
            'type' => 'min',
            'produk_id' => $request->id,
            'supplier_id' => null,
            'transaksi_id' => null,
            'keterangan' =>  $keterangan
        ];

        Inventori::create($dataInventori);

        return back()->with('success', 'Data berhasil diubah');
    }






    public function produkTerlaris()
    {

        if (!empty(request('tahum'))) {
            $tahun = request('tahun');
        } else {
            $tahun = date('Y');
        }
        if (!empty(request('bulan'))) {
            $bulan = request('bulan');
        } else {
            $bulan = date('m');
        }

        $tanggal  = $tahun . '-' .  $bulan;
        $produk = Produk::selectRaw(
            'nama_produk ,jumlah_stok,(SELECT sum(stok_out) FROM INVENTORI where produk_id = produk.id AND type = "OUT"  AND created_at LIKE "%' . $tanggal . '%") as jumlah_item_terjual,
         (SELECT COUNT(inventori.id) FROM INVENTORI where produk_id = produk.id AND type = "OUT" AND created_at LIKE "%' . $tanggal . '%") as jumlah_transaksi'
        )

            ->groupBy('produk.id')
            ->orderBy('jumlah_transaksi', 'desc')
            ->limit(20)->get();



        return view('produk.produkTerlaris')->with([
            'title' => 'Produk Terlaris',
            'data' => $produk,
        ]);
    }

    public function produkTerlarisPrint($tanggal)
    {

        // $produk = $produk->where('kategori_id', crypt_open($id))->orderBy('nama_produk', 'asc')->get()->toArray();
        $produk = Produk::selectRaw(
            'nama_produk ,jumlah_stok,(SELECT sum(stok_out) FROM INVENTORI where produk_id = produk.id AND type = "OUT" AND created_at LIKE "%' . $tanggal . '%") as jumlah_item_terjual,
         (SELECT COUNT(inventori.id) FROM INVENTORI where produk_id = produk.id AND type = "OUT" AND created_at LIKE "%' . $tanggal . '%") as jumlah_transaksi'
        )

            ->groupBy('produk.id')
            ->orderBy('jumlah_transaksi', 'desc')
            ->limit(20)->get()->toArray();

        // $kategori = ProdukKategori::find(crypt_open($id));
        $data = [
            'data' => $produk,
            // 'kategori' => $kategori->kategori
        ];
        $pdf = Pdf::loadView('produk.produkTerlarisPrint', $data);
        return $pdf->stream('invoice.pdf');
    }
}
