<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\MetodePembayaran;
use App\Models\Produk;
use App\Models\TransaksiProdukTemp;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data =  roleId();
        // dd($data);

        if (roleId() == 1) {
            return view('dashboard.index')->with([
                'title' => 'Dashboard'
            ]);
        } else if (roleId() == 2) {
            return view('dashboard.index')->with([
                'title' => 'Dashboard'
            ]);
        } else if (roleId() == 3) {
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
            return view('dashboard.kasir')->with([
                'title' => 'Dashboard',
                'data' => $data,
                'produk' => Produk::orderBy('nama_produk')->get(),
                'metode' => MetodePembayaran::get(),
                'jumlahItem' =>  $jumlahItem,
                'subtotal' => $subtotal,
                'exist' => TransaksiProdukTemp::exists(),
                'pembayaran' =>  TransaksiProdukTemp::where('metode_id', '>', 0)->exists(),
                'metodeId' =>  $metodeId
            ]);
        } else {
            return null;
        }
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
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
