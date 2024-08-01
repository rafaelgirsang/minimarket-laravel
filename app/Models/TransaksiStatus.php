<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiStatus extends Model
{
    use HasFactory;

    protected $table = 'transaksi_status';
    protected $fillable = ['status', 'color', 'sort'];
    protected $timestamp = true;

    public function scopeFilter($query, array $filters)
    {

        if (!empty(request('searchBy'))) {
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where(crypt_open(request('searchBy')), 'like', '%' . $search . '%');
            });
        } else {
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where('status', 'like', '%' . $search . '%');
            });
        }
    }
}