<?php
namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $pembayarans = Pembayaran::with('transaksi')
            ->when($search, function ($query) use ($search) {
                $query->whereHas('transaksi', function ($q) use ($search) {
                    $q->where('kode_transaksi', 'like', "%$search%");
                });
            })
            ->latest()
            ->paginate(10);

        return view('latihan.pembayaran.index', compact('pembayarans', 'search'));
    }

    public function create()
    {
        return view('latihan.pembayaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_transaksi'      => 'required|exists:transaksis,id',
            'tanggal_bayar'     => 'required|date',
            'metode_pembayaran' => 'required|in:cash,credit,debit',
            'jumlah_bayar'      => 'required|integer|min:0',
        ]);

        $transaksi = Transaksi::findOrFail($request->id_transaksi);

        $kembalian = $request->jumlah_bayar - $transaksi->total_harga;

        Pembayaran::create([
            'id_transaksi'      => $transaksi->id,
            'tanggal_bayar'     => $request->tanggal_bayar,
            'metode_pembayaran' => $request->metode_pembayaran,
            'jumlah_bayar'      => $request->jumlah_bayar,
            'kembalian'         => max($kembalian, 0),
        ]);

        return redirect()->route('pembayaran.index');
    }

    public function show($id)
    {
        $pembayaran = Pembayaran::with('transaksi.pelanggan')->findOrFail($id);
        return view('latihan.pembayaran.show', compact('pembayaran'));
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::with(['transaksi.pelanggan'])->findOrFail($id);
        return view('latihan.pembayaran.edit', compact('pembayaran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_transaksi'      => 'required|exists:transaksis,id',
            'tanggal_bayar'     => 'required|date',
            'metode_pembayaran' => 'required|in:cash,credit,debit',
            'jumlah_bayar'      => 'required|integer|min:0',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $transaksi  = Transaksi::findOrFail($request->id_transaksi);

        $kembalian = $request->jumlah_bayar - $transaksi->total_harga;

        $pembayaran->update([
            'id_transaksi'      => $transaksi->id,
            'tanggal_bayar'     => $request->tanggal_bayar,
            'metode_pembayaran' => $request->metode_pembayaran,
            'jumlah_bayar'      => $request->jumlah_bayar,
            'kembalian'         => max($kembalian, 0),
        ]);

        return redirect()->route('pembayaran.index');
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();

        return redirect()->route('pembayaran.index');
    }
}
