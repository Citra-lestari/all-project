<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function view()
    {
        return view('auth.login');
    }
    public function login(Request $request){
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->intended('/dashboard');
        }
        return back()->with('error', 'Login Gagal!');
    }

}
