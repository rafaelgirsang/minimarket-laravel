<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    use HasFactory;

    protected $table = 'jasa';
    protected $fillable = ['jasa', 'harga', 'satuan', 'deadline', 'waktu', 'is_active','customize'];
    protected $timestamp = true;


    public function scopeFilter($query, array $filters)
    {

        if (!empty(request('searchBy'))) {
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where(crypt_open(request('searchBy')), 'like', '%' . $search . '%');
            });
        } else {
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where('jasa', 'like', '%' . $search . '%')
                    ->orWhere('harga', 'like', '%' . $search . '%');
            });
        }

        $query->when($filters['status'] ?? false, function ($query, $status) {
            return $query->where('is_active', '=',  $status);
        });
    }

     public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
