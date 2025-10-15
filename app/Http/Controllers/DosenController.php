<?php
namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Storage;

class DosenController extends Controller
{

    public function index()
    {
        $dosen = Dosen::latest()->paginate(5);
        return view('dosen.index', compact('dosen'));
    }


    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'nama' => 'required|min:5',
        'NIPD' => 'required',
]);

        $dosen       = new Dosen();
        $dosen->nama = $request->nama;
        $dosen->NIPD = $request->NIPD;


        $dosen->save();
        return redirect()->route('dosen.index');
    }

    public function show($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.show', compact('dosen'));
    }

    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama'      => 'required|min:5',
            'NIPD'     => 'required',
        ]);

        $dosen            = Dosen::findOrFail($id);
        $dosen->nama      = $request->nama;
        $dosen->NIPD     = $request->NIPD;

        $dosen->save();
        return redirect()->route('dosen.index');

    }

    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return redirect()->route('dosen.index');

    }
}