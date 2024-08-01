<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';
    protected $fillable = ['tanggal', 'jasa', 'jumlah', 'satuan', 'harga', 'invoice', 'jasa_id', 'deadline', 'customer_id', 'pembayaran_id', 'status_id', 'cabang_id', 'user_id'];
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

    public function jasa()
    {
        return $this->belongsTo(Jasa::class);
    }

    public function cabang()
    {
        return $this->belongsTo(cabang::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function pembayaran()
    {
        return $this->belongsTo(pembayaran::class);
    }
    public function customer()
    {
        return $this->belongsTo(customer::class);
    }
    public function status()
    {
        return $this->belongsTo(PenjualanStatus::class);
    }
}
