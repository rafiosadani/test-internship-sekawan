<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyword = request('keyword');

        return view('dashboard.users.index', [
            'title' => 'Pengaturan Users',
            // 'users' => User::latest()->paginate(7)
            'users' => User::where('nama_lengkap', 'like', '%' . $keyword . '%')
                        ->orWhere('alamat', 'like', '%' . $keyword . '%')
                        ->orWhere('no_telp', 'like', '%' . $keyword . '%')
                        ->orWhere('email', 'like', '%' . $keyword . '%')
                        ->orWhereHas('role', function($query) use ($keyword) {
                            $query->where('nama_role', 'like', '%' . $keyword . '%');
                        })
                        ->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create', [
            'title' => 'Tambah User',
            'roles' => Role::all()
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
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|max:255',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'role_id' => 'required',
            'photo' => 'image|file|max:2048'
        ]);

        // apakah ada upload image
        if($request->file('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('user-images');
        } else {
            $validatedData['photo'] = 'default.jpg';
        }

        // hashing password
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/dashboard/users')->with('success', 'User baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', [
            'title' => 'Detail User',
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'title' => 'Edit User',
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd($request);
        $rules = [
            'nama_lengkap' => 'required|max:255',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'role_id' => 'required',
            'photo' => 'image|file|max:2048'
        ];

        if($request->email != $user->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        if($request->password != null) {
            $rules['password'] = 'required|min:5|max:255';
        }

        $validatedData = $request->validate($rules);

        // apakah edit password
        if($request->password) {
            // hashing password
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        // apakah ada upload photo
        if($request->file('photo')) {

            // delete old photo
            if($request->oldPhoto) {
                if($request->oldPhoto != 'default.jpg') {
                    Storage::delete($request->oldPhoto);
                }
            }

            $validatedData['photo'] = $request->file('photo')->store('user-images');
        }

        User::where('id', $user->id)->update($validatedData);

        return redirect('/dashboard/users')->with('success', 'User berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->photo) {
            if($user->photo != 'default.jpg') {
                Storage::delete($user->photo);
            }
        }
        
        User::destroy($user->id);

        return redirect('/dashboard/users')->with('success', 'User berhasil dihapus!');
    }
}
