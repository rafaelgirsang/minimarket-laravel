<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiStatusTemp extends Model
{

    use HasFactory;
    protected $table = 'transaksi_status_temp';
    protected $fillable = ['transaksi_id', 'status_id', 'user_id'];
    protected $timestamp = true;
}