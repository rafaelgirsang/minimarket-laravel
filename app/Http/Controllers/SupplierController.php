<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Supplier;
use App\Models\SupplierProduk;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filter = request(['search']);
        $data = Supplier::filter($filter)->paginate(show());
        return view('supplier.index')->with([
            'title' => 'Data Supplier',
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produk = Produk::where('is_active', 'Y')->get();
        $supplier = Supplier::where('is_active', 'Y')->get();
        return view('supplier.create')->with([
            'title' => 'Tambah Supplier',
            'produk' =>  $produk,
            'supplier' =>  $supplier,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Supplier::create($data);
        return redirect('supplier')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }
    public function produk(SupplierProduk $SupplierProduk, $id)
    {

        $produk = $SupplierProduk
            ->join('produk', 'produk.id', '=', 'produk_id')
            ->where('supplier_id', crypt_open($id))->paginate(1000);
        // dd($produk);

        $supplier = Supplier::find(crypt_open($id));
        // dd($supplier);

        return view('supplier.produk')->with([
            'title' => 'Supplier Produk',
            'data' =>  $produk,
            'supplier' => $supplier->nama_supplier


        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier, $id)
    {
        $data = $supplier->find(crypt_open($id));
        return view('supplier.edit')->with([
            'title' => 'Edit Supplier',
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier, $id)
    {
        $data = $request->all();
        $supplier->find(crypt_open($id))->fill($data)->save();
        return back()->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
