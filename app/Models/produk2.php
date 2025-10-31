<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk2 extends Model
{
    use HasFactory;

    protected $table    = 'produk2s';
    protected $fillable = ['nama_produk', 'harga', 'stok'];

    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_produk2');
    }
}
