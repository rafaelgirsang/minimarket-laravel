<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukKategori extends Model
{
    use HasFactory;

    protected $table = 'produk_kategori';
    protected $fillable = ['kategori', 'thumbnail', 'is_active'];
    protected $timestamp = true;


    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
    public function scopeFilter($query, array $filters)
    {

        if (!empty(request('searchBy'))) {
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where(crypt_open(request('searchBy')), 'like', '%' . $search . '%');
            });
        } else {
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where('kategori', 'like', '%' . $search . '%');
            });
        }
    }
}
