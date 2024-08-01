<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JurnalAkun extends Model
{
    use HasFactory;


    protected $table = 'jurnal_akun';
    protected $fillable = ['kode', 'akun', 'saldo_normal', 'laporan', 'kategori_id'];
    protected $timestamp = true;


    public function scopeFilter($query, array $filters)
    {

        if (!empty(request('searchBy'))) {
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where(crypt_open(request('searchBy')), 'like', '%' . $search . '%');
            });
        } else {
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where('akun', 'like', '%' . $search . '%');
            });
        }
    }

    public function kategori()
    {
        return $this->belongsTo(JurnalKategori::class);
    }
}
