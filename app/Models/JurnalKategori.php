<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalKategori extends Model
{
    protected $table = 'jurnal_kategori';
    protected $fillable = ['kode', 'kategori', 'deskripsi'];
    protected $timestamp = true;


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
