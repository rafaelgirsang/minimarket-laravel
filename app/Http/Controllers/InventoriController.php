<?php

namespace App\Http\Controllers;

use App\Models\Inventori;
use App\Models\Produk;
use App\Models\ProdukInventori;
use App\Models\ProdukKategori;
use Illuminate\Http\Request;

class InventoriController extends Controller
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
    public function show(Inventori $inventori, $id)
    {
        $inventori = $inventori->where('produk_id', crypt_open($id))->orderBy('created_at', 'desc')->paginate(show());



        $produk = Produk::find(crypt_open($id));
        // $kategori = ProdukKategori::find($produk->kategori_id);


        return view('inventori.index')->with([
            'title' => 'History Stok',
            'data' => $inventori,
            'produk' => $produk,
            // 'kategori' => $kategori
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventori $inventori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventori $inventori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventori $inventori)
    {
        //
    }
}
