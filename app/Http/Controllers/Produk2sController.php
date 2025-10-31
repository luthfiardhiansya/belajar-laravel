<?php

namespace App\Http\Controllers;

use App\Models\Produk2;
use Illuminate\Http\Request;

class Produk2sController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk2s = Produk2::all();
        return view('produk2.index', compact('produk2s'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk2.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_produk'       => 'required',
            'harga'             => 'required',
            'stok'              => 'required',
        ]);

        $produk2                       = new Produk2();
        $produk2->nama_produk          = $request->nama_produk;
        $produk2->harga                = $request->harga;
        $produk2->stok                 = $request->stok;

        $produk2->save();
        return redirect()->route('produk2.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produk2 = Produk2::findOrFail($id);
        return view('produk2.show', compact('produk2'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk2 = Produk2::findOrFail($id);
        return view('produk2.edit', compact('produk2'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_produk'       => 'required',
            'harga'             => 'required',
            'stok'              => 'required',
        ]);

        $produk2                       = new Produk2();
        $produk2->nama_produk          = $request->nama_produk;
        $produk2->harga                = $request->harga;
        $produk2->stok                 = $request->stok;

        $produk2 = Produk2::findOrFail($id);
        return redirect()->route('produk2.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk2 = Produk2::findOrFail($id);
        $produk2->delete();
        return redirect()->route('produk2.index');
    }
}
