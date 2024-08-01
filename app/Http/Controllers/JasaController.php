<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Http\Requests\StoreJasaRequest;
use App\Http\Requests\UpdateJasaRequest;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $filter = request(['search', 'cabang', 'gender', 'role', 'status']);
        $data = Jasa::filter($filter)->orderBy('is_active')->orderBy('sort')->paginate(show());
        return view('jasa.index')->with([
            'title' => 'Data Jasa',
            'data' => $data
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
    public function store(StoreJasaRequest $request)
    {
        $data = $request->all();
        $waktu = $request['waktu'];
        if ($waktu != 1) {
            $data['deadline'] = $data['deadline'] * 24;
        } else {
            $data['deadline'] = $data['deadline'];
        }

        // dd($data);
        Jasa::create($data);
        return back()->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jasa $jasa)
    {
        //
    }

    public function showJSON(Jasa $jasa, $id)
    {
        $data = $jasa->find($id);
        return response()->json($data);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jasa $jasa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJasaRequest $request, Jasa $jasa)
    {
        $data = $request->all();
        $waktu = $request['waktu'];
        if ($waktu != 1) {
            $data['deadline'] = $data['deadline'] * 24;
        } else {
            $data['deadline'] = $data['deadline'];
        }

        $jasa->find($data['id'])->fill($data)->save();
        return back()->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jasa $jasa, $id)
    {
        $jasa->find(crypt_open($id))->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
