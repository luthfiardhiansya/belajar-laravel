<?php

class Produk2 extends Model
{
    protected $fillable = ['nama_produk', 'harga', 'stok'];

    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
