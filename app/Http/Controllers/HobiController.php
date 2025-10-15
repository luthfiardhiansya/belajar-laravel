<?php
namespace App\Http\Controllers;

use App\Models\Hobi;
use Illuminate\Http\Request;

class HobiController extends Controller
{

    public function index()
    {
        $hobi = Hobi::latest()->paginate(5);
        return view('hobi.index', compact('hobi'));
    }

    public function create()
    {
        return view('hobi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_hobi' => 'required',
        ]);

        $hobi            = new Hobi();
        $hobi->nama_hobi = $request->nama_hobi;

        $hobi->save();
        return redirect()->route('hobi.index');
    }

    public function show($id)
    {
        $hobi = Hobi::findOrFail($id);
        return view('hobi.show', compact('hobi'));
    }

    public function edit($id)
    {
        $hobi = Hobi::findOrFail($id);
        return view('hobi.edit', compact('hobi'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_hobi' => 'required',
        ]);

        $hobi            = Hobi::findOrFail($id);
        $hobi->nama_hobi = $request->nama_hobi;

        $hobi->save();
        return redirect()->route('hobi.index');

    }

    public function destroy($id)
    {
        $hobi = Hobi::findOrFail($id);
        $hobi->delete();
        return redirect()->route('hobi.index');

    }
}