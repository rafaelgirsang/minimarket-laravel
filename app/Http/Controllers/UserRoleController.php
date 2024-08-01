<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userRole = UserRole::where('id','!=',1)->get();
        return view('user_role.index')->with([
            'title' => 'Role',
            'role'  =>$userRole
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_role.create')->with([
            'title' => 'Create',           
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        UserRole::create($data);
        return redirect('userRole')->with('success','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserRole $userRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserRole $userRole,$id)
    {
        $data = $userRole->find($id);
        return view('user_role.edit')->with([
            'title' => 'Update User Role',
            'userRole' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserRole $userRole, $id)
    {
        $data = $request->all();
        $userRole = $userRole->find($id);
        $userRole->fill($data)->save();
        return redirect('userRole')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserRole $userRole, $id)
    {
        $userRole->find($id)->delete();
        return redirect('userRole')->with('success','Data berhasil dhapus');
    }
}
