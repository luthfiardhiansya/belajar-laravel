<?php

class DetailTransaksi extends Model
{
    protected $fillable = ['transaksi_id', 'produk_id', 'jumlah', 'subtotal'];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
