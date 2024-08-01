<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\ProdukInventori;
use App\Models\ProdukKategori;
use Illuminate\Http\Request;

class ProdukInventoriController extends Controller
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
    public function create(ProdukInventori $produkInventori, $id)
    {
        $produk = Produk::find(crypt_open($id));
        $kategori = ProdukKategori::find($produk->kategori_id);


        return view('produk_inventori.create')->with([
            'title' => 'Produk',
            'produk' => $produk,
            'kategori' => $kategori

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        ProdukInventori::create($data);
        return redirect('produkInventori/inventori/' . crypt_make($data['produk_id']))->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProdukInventori $produkInventori, $id)
    {
        $data = $produkInventori->where('produk_id', crypt_open($id))->orderBy('priority')->paginate(show());

        $produk = Produk::find(crypt_open($id));
        $kategori = ProdukKategori::find($produk->kategori_id);


        return view('produk_inventori.index')->with([
            'title' => 'Inventori',
            'data' => $data,
            'produk' => $produk,
            'kategori' => $kategori
        ]);
    }

    // public function tambahStok()
    // {
    // }

    public function updateStokIn(Request $request, ProdukInventori $produkInventori, $id)
    {
        $data = $request->all();
        // dd($data);
        $data['jumlah_stok'] =  $data['stok_tersedia'] + $data['stok_ditambah'];


        $produkInventori->find($id)->fill($data)->save();
        return back()->with('success', 'Data berhasil ditambah');
    }
    public function updateStokOut(Request $request, ProdukInventori $produkInventori, $id)
    {


        $data = $request->all();

        if ($data['stok_dikurang'] >  $data['stok_tersedia']) {
            return back()->with('fail', 'Stok tersedia tidak cukup');
        }

        $data['jumlah_stok'] =  $data['stok_tersedia'] - $data['stok_dikurang'];
        $produkInventori->find($id)->fill($data)->save();
        return back()->with('success', 'Data berhasil ditambah');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdukInventori $produkInventori, $id)
    {
        $produk = Produk::find(crypt_open($id));
        $kategori = ProdukKategori::find($produk->kategori_id);
        $data = $produkInventori->find(crypt_open($id));


        return view('produk_inventori.edit')->with([
            'title' => 'Edit Harga',
            'data' => $data,
            'produk' => $produk,
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProdukInventori $produkInventori, $id)
    {
        $data = $request->all();

        $produkInventori->find($id)->fill($data)->save();
        return back()->with('success', 'Data berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdukInventori $produkInventori)
    {
        //
    }
}
