<?php

class Pembayaran extends Model
{
    protected $fillable = ['transaksi_id', 'metode', 'jumlah_bayar', 'kembalian'];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
