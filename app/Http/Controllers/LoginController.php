<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.log.login', [
            'tittlePage'    =>  'Sign In Admin'
        ]);
    }

    public function login(Request $request)
    {
        $validate = $request->validate([
            'username'  =>  'required',
            'password'  =>  'required|min:8'
        ]);

        if (Auth::attempt($validate)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Maaf, Login Gagal');
    }

    public function Logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
