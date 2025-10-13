<?php
namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    public function index()
    {
        $biodatas = Biodata::all();
        return view('biodata.index', compact('biodatas'));
    }

    public function create()
    {
        return view('biodata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'         => 'required',
            'tgl_lahir'    => 'required|date',
            'jk'           => 'required',
            'agama'        => 'required',
            'alamat'       => 'required',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tinggi_badan' => 'nullable|numeric',
            'berat_badan'  => 'nullable|numeric',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }

        Biodata::create($data);

        return redirect()->route('biodata.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Biodata $biodatum)
    {
        return view('biodata.edit', compact('biodatum'));
    }

    public function update(Request $request, Biodata $biodatum)
    {
        $request->validate([
            'nama'         => 'required',
            'tgl_lahir'    => 'required|date',
            'jk'           => 'required',
            'agama'        => 'required',
            'alamat'       => 'required',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tinggi_badan' => 'nullable|numeric',
            'berat_badan'  => 'nullable|numeric',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($biodatum->foto) {
                Storage::disk('public')->delete($biodatum->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto', 'public');
        }

        $biodatum->update($data);

        return redirect()->route('biodata.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Biodata $biodatum)
    {
        if ($biodatum->foto) {
            Storage::disk('public')->delete($biodatum->foto);
        }

        $biodatum->delete();

        return redirect()->route('biodata.index')->with('success', 'Data berhasil dihapus');
    }
}
