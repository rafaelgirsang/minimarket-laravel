<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\Customer;
use App\Models\Jasa;
use App\Models\Pembayaran;
use App\Models\Cabang;
use App\Models\TransaksiStatus;
use App\Models\TransaksiStatusHistory;
use App\Models\MetodePembayaran;
use Carbon\Carbon;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Pdf;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

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
    public function show(Request $request, string $kodePembayaran)
    {
         $pembayaran = Pembayaran::where('kode', $kodePembayaran)->first();
          $idPembayaran = $pembayaran->id;

        $data = $request->all();
        // $idPembayaran = $request->pembayaran_id;
        $transaksi = Transaksi::where('pembayaran_id', $idPembayaran)->get();

        $transaksiRow = Transaksi::where('pembayaran_id', $idPembayaran)->first();

      
   
        $customer = Customer::find($transaksiRow->customer_id);


        $tanggal = formatTanggal($transaksiRow->created_at);
        $jam = formatJam($transaksiRow->created_at);
        $data['tanggal_transaksi'] = $tanggal;
        $data['jam'] = $jam;
        $namaUser =  auth()->user()->nama;
        $namaUser = explode(' ', $namaUser);
        $namaUser = $namaUser[0];
        $data['cs'] =  $namaUser;
        $data['customer'] =  $customer->nama;
        $cabang = Cabang::find(auth()->user()->cabang_id);

       
        $pembayaran = Pembayaran::find($idPembayaran);

        $statusPembayaran = $pembayaran->status;
        if($statusPembayaran == 0 || $statusPembayaran == 1){
            $statusPembayaran = "Belum Bayar";
        }else if($statusPembayaran == 2){
            $statusPembayaran = "Lunas";
        }else{
            $statusPembayaran = '-';
        }
        $pembayaran['status_pembayaran'] =   $statusPembayaran;

        $metodePembayaran = MetodePembayaran::find($pembayaran->metode_id);
        // $metode 
        if(!empty($metodePembayaran)){
            $pembayaran['metode'] =  $metodePembayaran->metode;
        }
        
        

        // dd($pembayaran);


        $data = [
            'pembayaran' => $pembayaran,
            'transaksi' => $transaksi,
            'data' =>  $data,
            'cabang' => $cabang
        ];


        $pdf = Pdf::loadView('transaksi.cetakNota', $data);
        return $pdf->setPaper([0,0,100,200])->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif'])->stream();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
