<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login (){
        return view('login');
    }

    public function auth(Request $request){
        $validate = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Masukkan Email yang Valid',
            'password.required' => 'Password tidak boleh kosong'
        ]);

        if (Auth::attempt($validate)) {
            return redirect('dashboard');
        }

        return redirect()->back()->with('statusLogin', 'Maaf Login anda gagal, Email atau Password yang dimasukkan salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
