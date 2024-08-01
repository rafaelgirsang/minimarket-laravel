<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventori extends Model
{
    use HasFactory;
    protected $table = 'inventori';
    protected $fillable = ['stok_in', 'stok_out', 'total_stok', 'type', 'produk_id', 'supplier_id', 'transaksi_id', 'keterangan'];
    protected $timestamp = true;
}
