<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreServicesRequest;


class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $cari = Services::findOrFail('id');
        // dd($cari);
        return view('admin.services.index', [
            'tittlePage'    =>  'Services',
            'allserv'       =>  Services::all(),
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
    public function showw($id)
    {
        $Service = Services::find($id);
        return view('admin.services.detail', [
            'tittlePage'    =>  'Service Detail',
            'services'      =>  $Service
        ]);
    }
    public function editt($id)
    {
        $Service = Services::find($id);
        return view('admin.services.edit', [
            'tittlePage'    =>  'Service Update',
            'services'      =>  $Service
        ]);
    }

    public function updated(Request $request, $id)
    {
        $Service = Services::find($id);
        $validateUpdate = $request->validate([
            'image'     =>  'image|file',
            'tittle'    =>  'required',
            'deskripsi' =>  'required'
        ]);

        if ($request->file('image')) {
            if ($request->imageprodukOld) {
                Storage::delete($request->imageprodukOld);
            }

            $validateUpdate['image'] = $request->file('image')->store('img-service');
        }
        Services::where('id', $Service->id)
            ->update($validateUpdate);
        return redirect('/services')->with('success', 'Sukses Update Service !! ' . $Service->tittle);
    }

    public function delete($id)
    {
        $services = Services::find($id);
        if ($services->image) {
            Storage::delete($services->image);
        }
        Services::destroy($services->id);

        return redirect('/services')->with('success', 'Delete Service Sukses');
    }
}
