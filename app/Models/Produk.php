<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = ['nama_produk', 'harga', 'stok'];
    protected $visible  = ['nama_produk', 'harga', 'stok'];

    public function Transaksis()
    {
        return $this->belongsMany(Transaksi::class, 'detail_transaksi', 'id_produk', 'id_transaksi')
            ->withPivot('jumlah', 'sub_total')
            ->withTimestamps();
    }
}
