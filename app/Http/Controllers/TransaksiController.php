<?php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('pelanggan')->latest()->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        return view('transaksi.create', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_transaksi' => 'required|unique:transaksis',
            'tanggal'        => 'required|date',
            'pelanggan_id'   => 'required|exists:pelanggans,id',
            'total_harga'    => 'required|numeric',
        ]);

        $transaksi->save();
        return redirect()->route('transaksi.index');
    }

    public function edit($id)
    {
        $transaksi  = Transaksi::findOrFail($id);
        $pelanggans = Pelanggan::all();
        return view('transaksi.edit', compact('transaksi', 'pelanggans'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode_transaksi' => 'required',
            'tanggal'        => 'required|date',
            'pelanggan_id'   => 'required|exists:pelanggans,id',
            'total_harga'    => 'required|numeric',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($validated);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
