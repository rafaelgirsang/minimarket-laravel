<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserSetGajiRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

use App\Models\User;

use App\Models\UserRole;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = request(['search',  'gender', 'role', 'status']);
        $data = User::filter($filter)->whereNotIn('role_id',[1])->orderBy('is_active')->paginate(show());
        return view('user.index')->with([
            'title' => 'Data User',
            'data' => $data,
       
            'role' => UserRole::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create')->with([
            'title' => 'Tambah User',
            
            'role' => UserRole::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect('user')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, $id)
    {
        $data = $user->find(crypt_open($id));
        return view('user.edit')->with([
            'title' => 'Edit User',
            'data' => $data,
            'role' => UserRole::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user, $id)
    {
        $data = $request->all();


        $user = $user->find(crypt_open($id))->fill($data)->save();
        return back()->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, $id)
    {
        $user->find(crypt_open($id))->delete();
        return redirect('user')->with('success', 'Data berhasil dihapus');
    }


   
}
