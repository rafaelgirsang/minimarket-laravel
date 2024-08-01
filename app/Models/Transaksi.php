<?php

namespace App\Models;

use Database\Seeders\TransaksiStatusSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $fillable = ['tanggal', 'jumlah_item', 'total_harga', 'invoice', 'user_id', 'metode_id', 'administrasi', 'diskon'];
    protected $timestamp = true;


    public function scopeFilter($query, array $filters)
    {

        if (!empty(request('searchBy', 'status'))) {
            $query->when($filters['search'] ?? false, function ($query, $customer) {
                return $query->whereHas('customer', function ($query) use ($customer) {
                    return $query->where('nama', 'like', '%' . $customer . '%')
                        ->orWhere('jasa', 'like', '%' . $customer . '%');
                });
            });
        } else {
            $query->when($filters['search'] ?? false, function ($query, $customer) {
                return $query->whereHas('customer', function ($query) use ($customer) {
                    return $query->where('nama', 'like', '%' . $customer . '%')
                        ->orWhere('jasa', 'like', '%' . $customer . '%');
                });
            });
        }

        $query->when($filters['status'] ?? false, function ($query, $status) {
            return $query->where('status_id', '=', $status);
        });

        $query->when($filters['tanggal'] ?? false, function ($query, $tanggal) {
            return $query->where('tanggal', '=', $tanggal);
        });
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function metode()
    {
        return $this->belongsTo(MetodePembayaran::class);
    }
}
