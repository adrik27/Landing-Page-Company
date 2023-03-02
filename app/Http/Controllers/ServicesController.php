<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Http\Requests\StoreServicesRequest;
use App\Http\Requests\UpdateServicesRequest;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.services.index', [
            'tittlePage'    =>  'Services',
            'allserv'       =>  Services::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServicesRequest $request)
    {

        $validatedCreate = $request->validate([
            'image'     =>  'image|file',
            'tittle'    =>  'required',
            'deskripsi' =>  'required'
        ]);

        if ($request->file('image')) {
            $validatedCreate['image'] = $request->file('image')->store('img-service');
        }
        Services::create($validatedCreate);
        return redirect()->back()->with('success', 'Sukses Menambah Service !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Services $services)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServicesRequest $request, Services $services)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Services $services)
    {
        //
    }
}
