<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $cabang = Cabang::all();
        // alert()->success('Title','Lorem Lorem Lorem');
        return view('cabang.index')->with([
            'title' => 'List Cabang',
            'cabang' => $cabang
        ]);
    }

    public function newKode()
    {
        $kode = Cabang::latest()->first();
        if (!empty($kode)) {

            $array = explode('-', $kode->kode);
            $newKode = $array[1] + 1;
            $lenght = strlen($newKode);
            if ($lenght == 1) {
                $newKode = 'CB-0' . $newKode;
            } else {
                $newKode = 'CB-' . $newKode + 1;
            }
        } else {
            $newKode = 'CB-01';
        }
        return  $newKode;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $newKode = $this->newKode();
        return view('cabang.create')->with([
            'title' => 'Create Cabang',
            'newKode' => $newKode
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Cabang::create($data);
        return redirect('cabang')->with('success', 'Data berhasil ditambah');
        // redirect('tasks')->with('success', 'Task Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cabang $cabang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cabang $cabang, $id)
    {
        $data = $cabang->find($id);
        return view('cabang.update')->with([
            'title' => 'Update Cabang',
            'cabang' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cabang $cabang, $id)
    {
        $data = $request->all();
        $cabang = $cabang->find($id);
        $cabang->fill($data);
        $cabang->save();
        return redirect('cabang')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cabang $cabang, $id)
    {

        $cabang->find($id)->delete();
        return redirect('cabang')->with('success', 'Data berhasil dihapus');
    }
}
