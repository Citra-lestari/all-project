<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    // membuat function view untuk menampilkan halaman login
    public function view(){
        return view('auth.login');
        //panggil file login.blade.php yang ada di folder resources/views/auth
    }

    // function login untuk autentikasi
    public function login(Request $request){
        // validasi input
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // cek kredensial
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/index');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
