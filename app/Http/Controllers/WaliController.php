<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use App\Models\Wali;
use Illuminate\Http\Request;

class WaliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wali = Wali::with('mahasiswa')->get(); // ambil data wali + relasinya
        return view('wali.index', compact('wali'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        return view('wali.create', compact('mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'=>'required',
            'id_mahasiswa'=>'required|exists:mahasiswas,id|unique:walis',
        ]);

        $wali                  = new Wali();
        $wali->nama            = $request->nama;
        $wali->id_mahasiswa    = $request->id_mahasiswa;
        $wali->save();
        return redirect()->route('wali.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $wali = Wali::findOrFail($id);
        return view('wali.show', compact('wali'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $wali = Wali::findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        return view('wali.edit', compact('wali','mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validated = $request->validate([
            'nama'=>'required',
            'id_mahasiswa'=>'required|exists:mahasiswas,id|unique:walis',
        ]);

        $wali                  = Wali::findOrFail($id);
        $wali->nama            = $request->nama;
        $wali->id_mahasiswa    = $request->id_mahasiswa;
        $wali->save();
        return redirect()->route('wali.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $wali = Wali::findOrFail($id);
        $wali->delete();
        return redirect()->route('wali.index');
    }
}
