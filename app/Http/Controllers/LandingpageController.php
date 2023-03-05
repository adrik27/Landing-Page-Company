<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index()
    {
        return view('landingpage.layouts.index', [
            'tittlePage'    =>  'MT | Landing Page'
        ]);
    }
}
