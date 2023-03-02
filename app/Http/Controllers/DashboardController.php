<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dash()
    {
        return view('admin.partials.main', [
            'tittlePage' => 'Dashboard Admin ' . auth()->user()->nama,
        ]);
    }
}
