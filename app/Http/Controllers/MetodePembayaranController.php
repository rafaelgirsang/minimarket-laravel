<?php

namespace App\Http\Controllers;

use App\Models\MetodePembayaran;
use Illuminate\Http\Request;

class MetodePembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filter = request(['search','metode','status']);
        $data = MetodePembayaran::filter($filter)->orderBy('is_active')->paginate(show());

         return view('metode_pembayaran.index')->with([
            'title' => 'Metode Pembayaran',
            'data' => $data,
            // 'status' => TransaksiStatus::all()
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
    public function store(Request $request)
    {
           $data = [
                'metode' => $request->metode,
            ];
            MetodePembayaran::create($data);
            return back()->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(MetodePembayaran $metodePembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MetodePembayaran $metodePembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MetodePembayaran $metodePembayaran)
    {
        $metodePembayaran->find($request->id)->fill($request->all())->save();
         return back()->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MetodePembayaran $metodePembayaran)
    {
        //
    }
}
