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
        $rules = [
            'foto'      =>  'image|file',
            'nama'      =>  'required',
            'username'  =>  'required',
            'email'     =>  'required|email',
            'password'  =>  'required|min:8',
        ];

        $validatecreate = $request->validate($rules);

        if ($request->file('foto')) {
            $validatecreate['foto']    = $request->file('foto')->store('profil-admin');
        }

        $validatecreate['password'] = Hash::make($validatecreate['password']);

        if ($validatecreate == $validatecreate) {
            User::create($validatecreate);

            return redirect('/')->with('success', 'Registrasi Berhasil !!');
        }
        return redirect('/registrasi')->with('loginError', 'Registrasi Gagal Coba Cek Lagi !!');
    }
}
