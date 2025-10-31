<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table    = 'pelanggans';
    protected $fillable = ['nama', 'alamat', 'no_hp'];

    // Relasi: satu pelanggan punya banyak transaksi
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_pelanggan');
    }
}
