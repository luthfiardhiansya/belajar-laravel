<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    protected $fillable = [
        'kode_transaksi',
        'tanggal',
        'id_pelanggan',
        'total_harga',
    ];

    // Relasi ke pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
    public function produk2()
    {
    return $this->belongstoMany(Transaksi::class, 'detail_transaksi','id_transaksi', 'id_produk2')
        ->withPivot('jumlah', 'sub_total')
        ->withTimestamps();
    }
}