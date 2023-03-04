<?php

namespace App\Http\Controllers;

use App\Models\testimoni;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoretestimoniRequest;
use App\Http\Requests\UpdatetestimoniRequest;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.testimoni.index', [
            'tittlePage'    =>  'Testimoni Admin',
            'testimonies'   =>  testimoni::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimoni.index', [
            'tittlePage'    =>  'Testimoni Admin'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretestimoniRequest $request)
    {
        $validatedCreate = $request->validate([
            'image'     =>  'image|file',
            'kutipan'   =>  'required',
            'nama'      =>  'required'
        ]);

        if ($request->file('image')) {
            $validatedCreate['image'] = $request->file('image')->store('img-testimoni');
        }
        testimoni::create($validatedCreate);
        return redirect()->back()->with('success', 'Sukses Menambah Testimoni !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(testimoni $testimoni)
    {
        return view('admin.testimoni.detail', [
            'tittlePage'    =>  'Testimoni Admin',
            'testimoni'     =>  $testimoni
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(testimoni $testimoni)
    {
        return view('admin.testimoni.edit', [
            'tittlePage'    =>  'Update Admin',
            'testimoni'     =>  $testimoni
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetestimoniRequest $request, testimoni $testimoni)
    {
        $validateUpdate = $request->validate([
            'image'     =>  'image|file',
            'kutipan'   =>  'required',
            'nama'      =>  'required'
        ]);

        if ($request->file('image')) {
            if ($request->imageprodukOld) {
                Storage::delete($request->imageprodukOld);
            }

            $validateUpdate['image'] = $request->file('image')->store('img-testimoni');
        }
        testimoni::where('id', $testimoni->id)
            ->update($validateUpdate);
        return redirect('/testimoni')->with('success', 'Sukses Update Testimoni !!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(testimoni $testimoni)
    {
        if ($testimoni->image) {
            Storage::delete($testimoni->image);
        }
        testimoni::destroy($testimoni->id);

        return redirect('/testimoni')->with('success', 'Delete Testimoni Sukses');
    }
}
