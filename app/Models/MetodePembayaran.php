<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    use HasFactory;


    protected $table = 'metode_pembayaran';
    protected $fillable = ['metode', 'is_active', 'potongan'];
    protected $timestamp = true;

    public function scopeFilter($query, array $filters)
    {

        if (!empty(request('searchBy'))) {
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where(crypt_open(request('searchBy')), 'like', '%' . $search . '%');
            });
        } else {
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where('metode', 'like', '%' . $search . '%');
            });
        }

        $query->when($filters['status'] ?? false, function ($query, $status) {
            return $query->where('is_active', '=',  $status);
        });
    }
}
