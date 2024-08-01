<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Supplier;
use App\Models\SupplierProduk;
use Illuminate\Http\Request;

class SupplierProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filter = request(['search', 'produk']);
        $data = SupplierProduk::filter($filter)->paginate(show());
        return view('supplierProduk.index')->with([
            'title' => 'Supplier Produk',
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $produk = Produk::where('is_active', 'Y')->get();
        $supplier = Supplier::where('is_active', 'Y')->get();
        return view('supplierProduk.create')->with([
            'title' => 'Tambah Supplier',
            'produk' => $produk,
            'supplier' => $supplier,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['harga_last_update'] = timestamp();
        $data = $request->all();

        SupplierProduk::create($data);
        return redirect('supplierProduk')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(SupplierProduk $supplierProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SupplierProduk $supplierProduk, $id)
    {

        $produk = Produk::where('is_active', 'Y')->get();
        $supplier = Supplier::where('is_active', 'Y')->get();
        $data = $supplierProduk->find(crypt_open($id));
        return view('supplierProduk.edit')->with([
            'title' => 'Edit Supplier Produk',
            'data' => $data,
            'produk' => $produk,
            'supplier' => $supplier,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SupplierProduk $supplierProduk, $id)
    {
        $data = $request->all();


        $dataSupplierProduk = $supplierProduk->find(crypt_open($id));
        $hargaBeliSekarang = $dataSupplierProduk->harga_beli;
        $hargaBeliBaru = (int)$request->harga_beli;

        if ($hargaBeliSekarang !=  $hargaBeliBaru) {
            $data['harga_last_update'] = timestamp();
        }
     
        $supplierProduk->find(crypt_open($id))->fill($data)->save();
        return back()->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SupplierProduk $supplierProduk, $id)
    {
        $supplierProduk->find(crypt_open($id))->delete();
        return redirect('supplierProduk')->with('success', 'Data berhasil dihapus');
    }
}