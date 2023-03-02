<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    public function index()
    {
        return view('auth.reg.registrasi');
    }

    public function registrasi(Request $request)
    {
        $validatecreate = $request->validate([
            'nama'      =>  'required',
            'username'  =>  'required',
            'email'     =>  'required|email',
            'password'  =>  'required|min:8|max:10',
        ]);


        $validatecreate['password'] = Hash::make($validatecreate['password']);

        if ($validatecreate == $validatecreate) {
            User::create($validatecreate);

            return redirect('/')->with('success', 'Registrasi Berhasil !!');
        }
        return redirect('/registrasi')->with('loginError', 'Registrasi Gagal Coba Cek Lagi !!');
    }
}
