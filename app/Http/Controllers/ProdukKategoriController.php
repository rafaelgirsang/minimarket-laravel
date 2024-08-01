<?php

namespace App\Http\Controllers;

use App\Models\ProdukKategori;
use App\Http\Requests\StoreProdukKategoriRequest;
use App\Http\Requests\UpdateProdukKategoriRequest;
use App\Models\Produk;
use Barryvdh\DomPDF\Facade\Pdf;


class ProdukKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filter = request(['search', 'kategori',  'status']);
        $data = ProdukKategori::filter($filter)
            ->selectRaw('*,(SELECT count(*) FROM produk where kategori_id = produk_kategori.id) as jumlah_produk')
            ->orderBy('is_active')->orderBy('kategori', 'asc')->paginate(100);
        // dd($data);

        return view('produk_kategori.index')->with([
            'title' => 'Kategori Produk',
            'data' => $data,
        ]);
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
    public function store(StoreProdukKategoriRequest $request)
    {
        $data = $request->all();
        ProdukKategori::create($data);
        return back()->with('success', 'Data berhasil ditambah');
    }


    public function produkKategoriJSON(ProdukKategori $produkKategori, $id)
    {
        return json_encode($produkKategori->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukKategoriRequest $request, ProdukKategori $produkKategori)
    {
        $data = $request->all();
        $produkKategori->find($data['id'])->fill($data)->save();
        return back()->with('success', 'Data berhasil ditambah');
    }
    public function updateKategori(UpdateProdukKategoriRequest $request, ProdukKategori $produkKategori)
    {

        $data = $request->all();
        $produkKategori->find($data['id'])->fill($data)->save();
        return back()->with('success', 'Data berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProdukKategori $produkKategori, $id)
    {

        $produkKategori->find(crypt_open($id))->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }



    public function showProduk(Produk $produk, $id)
    {
        $produk = $produk->where('kategori_id', crypt_open($id))->orderBy('nama_produk', 'asc')->paginate(show());

        $kategori = ProdukKategori::find(crypt_open($id));

        // dd($kategori);
        return view('produk_kategori.listProduk')->with([
            'title' => 'List Produk',
            'data' => $produk,
            'kategori' => $kategori

        ]);
    }

    public function listProdukPrint(Produk $produk, $id)
    {
        $produk = $produk->where('kategori_id', crypt_open($id))->orderBy('nama_produk', 'asc')->get()->toArray();

        $kategori = ProdukKategori::find(crypt_open($id));
        $data = [
            'data' => $produk,
            'kategori' => $kategori->kategori
        ];
        $pdf = Pdf::loadView('produk_kategori.listProdukPrint', $data);
        return $pdf->stream('invoice.pdf');
    }
}
