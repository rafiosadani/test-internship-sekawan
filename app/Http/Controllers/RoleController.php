<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = request('keyword');

        return view('dashboard.roles.index', [
            'title' => 'Role',
            'roles' => Role::where('nama_role', 'like', '%' . $keyword . '%')->paginate(2)->withQueryString()
            // 'posts' => Post::where('user_id', auth()->user()->id)->filter(request(['search']))->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.roles.create', [
            'title' => 'Tambah Role'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi inputan user
        $validatedData = $request->validate([
            'nama_role' => 'required',
        ]);

        // insert data ke database
        Role::create($validatedData);

        // redirect dan set pesan berhasil ditambahkan
        return redirect('/dashboard/roles')->with('success', 'Role baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('dashboard.roles.edit', [
            'title' => 'Edit Roles',
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        // validasi inputan user
        $validatedData = $request->validate(
            [
                'nama_role' => 'required',
            ],
            [
                'nama_role.required' => 'Role tidak boleh kosong.'
            ]
        );

        // update data ke database
        Role::where('id', $role->id)->update($validatedData);

        // redirect dan set pesan berhasil di edit
        return redirect('/dashboard/roles')->with('success', 'Role berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // delete data 
        Role::destroy($role->id);

        // redirect dan set pesan berhasil dihapus
        return redirect('/dashboard/roles')->with('success', 'Role berhasil dihapus!');
    }
}
