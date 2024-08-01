<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiStatusHistory extends Model
{
    use HasFactory;
    protected $table = 'transaksi_status_history';
    protected $fillable = ['datetime', 'transaksi_id', 'status_id', 'user_id'];
    protected $timestamp = true;

    public function status()
    {
        return $this->belongsTo(TransaksiStatus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
