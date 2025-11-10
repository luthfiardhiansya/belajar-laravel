<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk2 extends Model
{
    use HasFactory;

    protected $fillable = ['nama_produk', 'harga', 'stok'];
    protected $visible  = ['nama_produk', 'harga', 'stok'];

    public function Transaksis()
    {
        return $this->belongsMany(Transaksi::class, 'detail_transaksi', 'id_produk2', 'id_transaksi')
            ->withPivot('jumlah', 'sub_total')
            ->withTimestamps();
    }
}
