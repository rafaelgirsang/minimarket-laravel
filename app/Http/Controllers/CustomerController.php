<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StorecustomerRequest;
use App\Http\Requests\UpdatecustomerRequest;
use App\Models\Cabang;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cabangId = auth()->user()->cabang_id;
        $filter = request(['search', 'cabang', 'gender']);
        $data = Customer::filter($filter)->where('cabang_id', $cabangId)->paginate(show());
        return view('customer.index')->with([
            'title' => 'Data Customer',
            'data' => $data,
            'cabang' => Cabang::all(),

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
    public function store(StorecustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(customer $customer)
    {
        //
    }

    public function showJSON(customer $customer, $id)
    {
        $data = $customer->find($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecustomerRequest $request, customer $customer)
    {
        $data = $request->all();      
        $customer->find($request->id)->fill($data)->save();
        return back()->with('success', 'Data berhasil diubah');
     
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(customer $customer)
    {
        //
    }
}
