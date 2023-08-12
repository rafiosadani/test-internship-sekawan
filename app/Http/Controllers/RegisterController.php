<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register.index', [
            "title" => "Register Page",
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255|same:konfirmasi_password',
            'konfirmasi_password' => 'required|min:5|max:255'
        ]); 

        // hashing password
        $validatedData['password'] = Hash::make($validatedData['password']);

        $validatedData['role_id'] = 3;

        // insert user to table users
        User::create($validatedData);

        return redirect('/login')->with('success', 'Registrasi telah berhasil! silahkan login.');
    }
}
