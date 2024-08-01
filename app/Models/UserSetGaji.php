<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSetGaji extends Model
{
    use HasFactory;   
    protected $table = 'user_set_gaji';
    protected $fillable = ['pokok','tunjangan', 'insentif','lembur','user_id'];
    protected $timestamp = true;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
