<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Services;
use App\Models\testimoni;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dash()
    {
        return view('admin.partials.main', [
            'tittlePage'    => 'Dashboard Admin ' . auth()->user()->nama,
            'services'      =>  Services::all(),
            'portofolios'   =>  Portfolio::all(),
            'testimonies'   =>  testimoni::all()
        ]);
    }
}
