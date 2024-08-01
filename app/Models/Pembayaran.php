<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $fillable = [
        'tanggal', 'kode', 'total_harga',  'tanggal_lunas', 'bayar_lunas',
        'diskon', 'status','metode_id'
    ];
    protected $timestamp = true;
}
