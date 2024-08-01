<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPresensiShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_presensi_shift')->insert([
            'shift' => 'Shift 1', 
            'jam_mulai' => '08:00',
            'jam_selesai' => '16:00',
            'created_at' =>  Carbon::now(),       
            'updated_at' =>  Carbon::now()           
        ]);
        DB::table('user_presensi_shift')->insert([
            'shift' => 'Shift 2', 
            'jam_mulai' => '16:00',
            'jam_selesai' => '21:00',
            'created_at' =>  Carbon::now(),       
            'updated_at' =>  Carbon::now()      
        ]);
    }
}
