<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\JurnalAkun;
use App\Models\JurnalKategori;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        jurnalOtomatis();
        $filter = request(['search', 'tanggal', 'keterangan']);
        $data = Jurnal::filter($filter)->orderBy('tanggal', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(show());

        $akun = JurnalAkun::all();
        return view('jurnal.index')->with([
            'title' => 'Jurnal Umum',
            'data' => $data,
            'akun' => $akun
        ]);
    }


    public function test()
    {



        $month = date('m');
        $day = date('d');
        if (in_array($day, [1, 2, 3, 4])) {
            $monthPrev =  date("Y-m", strtotime("last day of previous month"));
            $monthNow = date('Y-m');

            $monthPrev31 = $monthPrev . '-31';
            $monthPrev30 = $monthPrev . '-30';
            $monthPrev29 = $monthPrev . '-29';
            $monthPrev28 = $monthPrev . '-28';

            $tanggalTransaksi =  Transaksi::where('tanggal', 'LIKE', "%$monthNow%")
                ->orWhere('tanggal', 'LIKE', "%$monthPrev31%")
                ->orWhere('tanggal', 'LIKE', "%$monthPrev30%")
                ->orWhere('tanggal', 'LIKE', "%$monthPrev29%")
                ->orWhere('tanggal', 'LIKE', "%$monthPrev28%")
                ->groupBy('tanggal')->get();
        } else {
            $tanggalTransaksi =  Transaksi::where('tanggal', 'LIKE', "%$month%")->groupBy('tanggal')->get();
        }





        foreach ($tanggalTransaksi as $value) {
            $tanggal = $value['tanggal'];
            echo $tanggal;
            echo '<br>';


            $jurnal =  Jurnal::where('tanggal', $tanggal)
                ->whereIn('akun_id', [7, 8]) // 7 Pendapatan penjualan 8 Biaya Administrasi
                ->exists(); // 
            dump($jurnal);
            if (!$jurnal) {

                // echo 'create';
                // dd('ta');
                $totalHarga =  DB::table('transaksi')->selectRaw('tanggal, sum(total_harga) as total')->where('tanggal', 'LIKE', '%' . $tanggal . '%')->first();



                $keterangan = "Pendapatan Penjualan";


                $akundIdPendapatanPenjualan = 7; // pendapatan penjualan
                $jurnalAkun = JurnalAkun::find($akundIdPendapatanPenjualan);


                if ($jurnalAkun->saldo_normal == 'DEBIT') {
                    $debit =  $totalHarga->total;
                    $kredit = 0;
                } else if ($jurnalAkun->saldo_normal == 'KREDIT') {
                    $debit =  0;
                    $kredit = $totalHarga->total;
                }

                //Pendapatan
                $data = [
                    'tanggal' =>  $tanggal,
                    'keterangan' => $keterangan,
                    'debit' =>  $debit,
                    'kredit' => $kredit,
                    'akun_id' => $akundIdPendapatanPenjualan

                ];
                Jurnal::create($data);

                $totalAdministrasi =  DB::table('transaksi')->selectRaw('tanggal, sum(administrasi) as total')->where('tanggal', 'LIKE', '%' . $tanggal . '%')->first();;

                // $totalAdministrasi =  Transaksi::selectRaw('SUM(administrasi) as administrasi')->where('tanggal', 'LIKE', `%$tanggal%`)->first();



                $akundIdAdministrasi = 8; // Administrasi
                $jurnalAkun = JurnalAkun::find($akundIdAdministrasi);


                $keterangan = "Biaya Administrasi";
                if ($jurnalAkun->saldo_normal == 'DEBIT') {
                    $debit =  $totalAdministrasi->total;
                    $kredit = 0;
                } else if ($jurnalAkun->administrasi == 'KREDIT') {
                    $debit =  0;
                    $kredit = $totalAdministrasi->total;
                }
                $data = [
                    'tanggal' =>  $tanggal,
                    'keterangan' => $keterangan,
                    'debit' =>  $debit,
                    'kredit' => $kredit,
                    'akun_id' => $akundIdAdministrasi

                ];
                Jurnal::create($data);
            } else {
                // echo 'update';

                $totalHarga =  DB::table('transaksi')->selectRaw('tanggal, sum(total_harga) as total')->where('tanggal', 'LIKE', '%' . $tanggal . '%')->first();



                $keterangan = "Pendapatan Penjualan";


                $akundIdPendapatanPenjualan = 7; // pendapatan penjualan
                $jurnalAkun = JurnalAkun::find($akundIdPendapatanPenjualan);


                if ($jurnalAkun->saldo_normal == 'DEBIT') {
                    $debit =  $totalHarga->total;
                    $kredit = 0;
                } else if ($jurnalAkun->saldo_normal == 'KREDIT') {
                    $debit =  0;
                    $kredit = $totalHarga->total;
                }
                // $jurnalUmum = Jurnal::where('tanggal', $tanggal)
                //     ->where('akun_id', $akundIdPendapatanPenjualan)->first();

                $jurnalUmum =  DB::table('jurnal_umum')
                    ->where('tanggal', 'LIKE', '%' . $tanggal . '%')
                    ->where('akun_id', $akundIdPendapatanPenjualan)
                    ->first();



                //Pendapatan
                $data = [
                    'tanggal' =>  $tanggal,
                    'keterangan' => $keterangan,
                    'debit' =>  $debit,
                    'kredit' => $kredit,
                    'akun_id' => $akundIdPendapatanPenjualan

                ];
                Jurnal::find($jurnalUmum->id)->fill($data)->save();


                $totalAdministrasi =  DB::table('transaksi')->selectRaw('tanggal, sum(administrasi) as total')->where('tanggal', 'LIKE', '%' . $tanggal . '%')->first();;




                $akundIdAdministrasi = 8; // Administrasi
                $jurnalAkun = JurnalAkun::find($akundIdAdministrasi);


                $jurnalUmum =  DB::table('jurnal_umum')
                    ->where('tanggal', 'LIKE', '%' . $tanggal . '%')
                    ->where('akun_id', $akundIdAdministrasi)
                    ->first();;
                $keterangan = "Biaya Administrasi";

                if ($jurnalAkun->saldo_normal == 'DEBIT') {
                    $debit =  $totalAdministrasi->total;
                    $kredit = 0;
                } else if ($jurnalAkun->administrasi == 'KREDIT') {
                    $debit =  0;
                    $kredit = $totalAdministrasi->total;
                }
                $data = [
                    'tanggal' =>  $tanggal,
                    'keterangan' => $keterangan,
                    'debit' =>  $debit,
                    'kredit' => $kredit,
                    'akun_id' => $akundIdAdministrasi

                ];
                Jurnal::find($jurnalUmum->id)->fill($data)->save();
            }
        }
    }

    public function create()
    {
        $debit = JurnalAkun::all();

        return view('jurnal.create')->with([
            'title' => 'Produk',
            'debit' => $debit,
            'kredit' => $debit,
        ]);
    }


    public function storeJurnal(Request $request)
    {
        $data = $request->all();

        $akun = JurnalAkun::find($request->akun_id);
        $data['saldo_normal'] = $akun->saldo_normal;
        if ($akun->saldo_normal == 'DEBIT') {
            $data['debit'] = $request->jumlah;
            $data['kredit'] = 0;
        } else {
            $data['debit'] = 0;
            $data['kredit'] = $request->jumlah;
        }





        Jurnal::create($data);
        return redirect('jurnal')->with('success', 'Data berhasil ditambah');
    }



    public function akun()
    {

        $filter = request(['search']);
        $data = JurnalAkun::filter($filter)->paginate(show());
        return view('jurnal.akun')->with([
            'title' => 'Akun Jurnal',
            'data' => $data,
            'kategori' => JurnalKategori::all()
        ]);
    }


    public function storeAkun(Request $request)
    {
        $data = $request->all();

        JurnalAkun::create($data);
        return back()->with('success', 'Data berhasil ditambah');
    }
    public function updateAkun(Request $request, JurnalAkun $jurnalAkun, $id)
    {

        $data = [
            'kode' => $request->kode,
            'akun' => $request->akun,
            'saldo_normal' => $request->saldo_normal,
            'kategori_id' => $request->kategori_id,
            'laporan' => 1
        ];

        $jurnalAkun->find($id)->fill($data)->save();
        return back()->with('success', 'Data berhasil diubah');
    }






    public function kategori()
    {

        $filter = request(['search', 'kategori']);
        $data = JurnalKategori::filter($filter)->paginate(show());
        return view('jurnal.kategori')->with([
            'title' => 'Kategori Akun',
            'data' => $data
        ]);
    }


    public function storeKategori(Request $request)
    {
        $data = $request->all();
        JurnalKategori::create($data);
        return back()->with('success', 'Data berhasil ditambah');
    }

    public function udpateKategori(Request $request, JurnalKategori $jurnalKategori, $id)
    {

        $data = [
            'kode' => $request->kode,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi
        ];

        $jurnalKategori->find($id)->fill($data)->save();
        return back()->with('success', 'Data berhasil diubah');
    }





    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurnal $jurnal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurnal $jurnal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurnal $jurnal)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurnal $jurnal)
    {
        //
    }
}
