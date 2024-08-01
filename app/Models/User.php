<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $fillable = ['nama_user','gender',  'email', 'telpon', 'password', 'role_id','is_active'];
    protected $timestamp = true;

    public function scopeFilter($query, array $filters)
    {

        if(!empty(request('searchBy'))){              
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where(crypt_open(request('searchBy')), 'like', '%' . $search . '%');
            });
        }else{
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where('nama_user', 'like', '%' . $search . '%')
                    ->orWhere('telpon', 'like', '%' .$search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });    
        }                     
        $query->when($filters['gender'] ?? false, function ($query, $gender) {
            return $query->where('gender', '=', $gender);
        });

       

        $query->when($filters['role'] ?? false, fn($query, $role) =>
            $query->whereHas('role', fn($query) =>
                $query->where('role',$role)
            )
        ); //versi arrow function

        $query->when($filters['status'] ?? false, function ($query, $status) {
            return $query->where('is_active', '=',  $status);
        });

    }

  
    public function role()
    {
        return $this->belongsTo('App\Models\UserRole');
    }
}