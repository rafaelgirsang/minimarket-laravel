<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; /////////////////////////////////////////////////////////?

class Jurnal extends Model
{
    use HasFactory;


    protected $table = 'jurnal_umum';
    protected $fillable = ['tanggal', 'akun_id', 'debit', 'kredit', 'keterangan'];
    protected $timestamp = true;


    public function scopeFilter($query, array $filters)
    {

        if (!empty(request('searchBy'))) {
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where((request('searchBy')), 'like', '%' . $search . '%');
            });
        } else {
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where('keterangan', 'like', '%' . $search . '%')
                    ->orWhere('tanggal', 'like', '%' . $search . '%');
            });
        }
        // $query->when($filters['gender'] ?? false, function ($query, $gender) {
        //     return $query->where('gender', '=', $gender);
        // });



        // $query->when(
        //     $filters['role'] ?? false,
        //     fn ($query, $role) =>
        //     $query->whereHas(
        //         'role',
        //         fn ($query) =>
        //         $query->where('role', $role)
        //     )
        // ); //versi arrow function

        // $query->when($filters['status'] ?? false, function ($query, $status) {
        //     return $query->where('is_active', '=',  $status);
        // });
    }

    public function akun()
    {
        return $this->belongsTo(JurnalAkun::class);
    }
}
