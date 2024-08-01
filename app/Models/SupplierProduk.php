<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierProduk extends Model
{
    protected $table = 'supplier_produk';
    protected $fillable = ['harga_beli', 'harga_last_update', 'produk_id', 'supplier_id', 'is_active'];
    protected $timestamp = true;


    public function scopeFilter($query, array $filters)
    {

        if (!empty(request('searchBy'))) {
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where(crypt_open(request('searchBy')), 'like', '%' . $search . '%');
            });
        } else {
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where('nama_produk', 'like', '%' . $search . '%');
            });
        }
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
