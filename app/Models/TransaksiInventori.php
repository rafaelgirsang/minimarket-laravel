<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiInventori extends Model
{
    use HasFactory;
    protected $table = 'transaksi_inventori';
    protected $fillable = ['jumlah', 'harga',  'produkInventori_id', 'transaksi_id', 'produk_id'];
    protected $timestamp = true;
}
