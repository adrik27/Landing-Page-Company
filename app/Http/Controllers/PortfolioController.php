<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.portfolio.index', [
            'tittlePage'    =>  'Portofolio Admin',
            'allport'       =>  Portfolio::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolio.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePortfolioRequest $request)
    {
        $validatedCreate = $request->validate([
            'image'     =>  'image|file',
            'kategori'  =>  'required',
            'tittle'    =>  'required'
        ]);

        if ($request->file('image')) {
            $validatedCreate['image'] = $request->file('image')->store('img-portfolio');
        }
        Portfolio::create($validatedCreate);
        return redirect()->back()->with('success', 'Sukses Menambah Portfolio !!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolio.detail', [
            'tittlePage'    =>  'Portfolio Admin',
            'portfolio'     =>  $portfolio
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', [
            'tittlePage'    =>  'Update Admin',
            'portfolio'     =>  $portfolio,
            'portfolios'     => Portfolio::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        $validateUpdate = $request->validate([
            'image'     =>  'image|file',
            'tittle'    =>  'required',
            'kategori'  =>  'required'
        ]);

        if ($request->file('image')) {
            if ($request->imageprodukOld) {
                Storage::delete($request->imageprodukOld);
            }

            $validateUpdate['image'] = $request->file('image')->store('img-porfolio');
        }
        Portfolio::where('id', $portfolio->id)
            ->update($validateUpdate);
        return redirect('/portfolio')->with('success', 'Sukses Update Service !! ' . $portfolio->tittle);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image) {
            Storage::delete($portfolio->image);
        }
        Portfolio::destroy($portfolio->id);

        return redirect('/portfolio')->with('success', 'Delete Portfolio Sukses');
    }
}
