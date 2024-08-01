<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';
    protected $fillable = ['nama', 'telpon','cabang_id'];
    protected $timestamp = true;


    public function scopeFilter($query, array $filters)
    {

        if (!empty(request('searchBy'))) {
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where(crypt_open(request('searchBy')), 'like', '%' . $search . '%');
            });
        } else {
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('telpon', 'like', '%' . $search . '%');
                   
            });
        }
     

        $query->when($filters['cabang'] ?? false, function ($query, $cabang) {
            return $query->whereHas('cabang', function ($query) use ($cabang) {
                return $query->where('nama', 'like', '%' . $cabang . '%');
            });
        }); // versi callback

    }

    public function customer()
    {
        return $this->belongsTo(customer::class, 'foreign_key', 'owner_key');
    }
    public function cabang()
    {
        return $this->belongsTo('App\Models\Cabang');
    }
    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }
}
