<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiProduk extends Model
{
    use HasFactory;
    protected $table = 'transaksi_produk';
    protected $fillable = ['barcode', 'produk', 'harga', 'jumlah', 'produk_id', 'transaksi_id'];
    protected $timestamp = true;
}
