<?php

namespace App\Http\Controllers;

// use model user
use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // function untuk menampilkan form register
    public function index() {
        return view('auth.register');
    }

    // function untuk proses register
    public function register(Request $request)
    {
        // validasi apakah inputannya sudah sesuai isinya dengan yang kita mau
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
        ]);

        // simpan inputan data yang sudah dimasukkan oleh user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // redirect ke halaman login login
        return redirect('/login')->with('success', 'Register berhasil');
    }
}
