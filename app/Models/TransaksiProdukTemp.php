<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiProdukTemp extends Model
{
    use HasFactory;
    protected $table = 'transaksi_produk_temp';
    protected $fillable = ['barcode', 'produk', 'harga', 'jumlah', 'produk_id', 'metode_id'];
    protected $timestamp = true;


    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
