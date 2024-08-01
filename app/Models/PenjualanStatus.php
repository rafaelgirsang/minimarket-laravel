<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanStatus extends Model
{
    use HasFactory;

    protected $table = 'penjualan_status';
    protected $fillable = ['status', 'color', 'sort'];
    protected $timestamp = true;
}
