<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukSupplierHistory extends Model
{
    use HasFactory;

    protected $table = 'produk_supplier_history';
    protected $fillable = ['harga_beli', 'stok', 'produk_id', 'supplier_id'];
    protected $timestamp = true;
}
