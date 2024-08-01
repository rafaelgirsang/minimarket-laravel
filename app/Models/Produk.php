<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $fillable = ['nama_produk', 'barcode', 'harga_jual', 'jumlah_stok', 'is_active', 'kategori_id'];
    protected $timestamp = true;


    public function scopeFilter($query, array $filters)
    {

        // if (!empty(request('searchBy'))) {
        //     $query->when($filters['search'] ?? false, function ($query, $search) {
        //         return $query->where(crypt_open(request('searchBy')), 'like', '%' . $search . '%');
        //     });
        // } else {
        //     $query->when($filters['search'] ?? false, function ($query, $search) {
        //         return $query->where('nama_produk', 'like', '%' . $search . '%');
        //     });
        // }


        if (!empty(request('searchBy'))) {
            $query->when($filters['search'] ?? false, function ($query, $customer) {
                return $query->whereHas('kategori', function ($query) use ($customer) {
                    return $query->where(crypt_open(request('searchBy')), 'like', '%' . $customer . '%');
                });
            });
        } else {
            $query->when($filters['search'] ?? false, function ($query, $customer) {
                return $query->whereHas('kategori', function ($query) use ($customer) {
                    return $query->where('kategori', 'like', '%' . $customer . '%')
                        ->orWhere('nama_produk', 'like', '%' . $customer . '%')
                        ->orWhere('barcode', 'like', '%' . $customer . '%');
                });
            });
        }
    }

    public function kategori()
    {
        return $this->belongsTo(ProdukKategori::class);
    }

    public function transaksiProdukTemp()
    {
        return $this->belongsTo(TransaksiProdukTemp::class);
    }
}
