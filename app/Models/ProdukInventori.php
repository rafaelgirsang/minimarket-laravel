<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukInventori extends Model
{
    use HasFactory;
    protected $table = 'produk_inventori';
    protected $fillable = ['harga_beli', 'jumlah_stok', 'produk_id', 'updated_at'];
    protected $timestamp = true;
}
