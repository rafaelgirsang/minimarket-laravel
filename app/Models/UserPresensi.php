<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPresensi extends Model
{
    use HasFactory;
    protected $table = 'user_presensi';
    protected $fillable = ['tanggal', 'hari', 'jam_datang', 'jam_pulang', 'presensi', 'lembur', 'terlambat', 'user_id', 'shift_id', 'keterangan'];
    protected $timestamp = true;


    public function scopeFilter($query, array $filters)
    {

        if (!empty(request('searchBy'))) {
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where(crypt_open(request('searchBy')), 'like', '%' . $search . '%');
            });
        } else {
            $query->when($filters['search'] ?? false, function ($query, $search) {
                return $query->where('hari', 'like', '%' . $search . '%');
            });
        }
        $query->when($filters['shift'] ?? false, function ($query, $shift) {
            return $query->where('shift_id', '=', $shift);
        });
        $query->when($filters['presensi'] ?? false, function ($query, $presensi) {
            return $query->where('presensi', '=', $presensi);
        });

        $tahun = request('tahun');
        $tahun = $tahun == '' ? date('Y') : $tahun;
        $bulan = request('bulan');
        $bulan = $bulan == '' ? date('m') : $bulan;
        $tanggal = $tahun . '-' . $bulan;
        return $query->where('tanggal', 'like',  '%' . $tanggal . '%');
    }
}
