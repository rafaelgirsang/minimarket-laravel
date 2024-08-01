<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetodePembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('metode_pembayaran')->insert([
            'metode' => 'Cash',
            'is_active' => 'Y',
            'potongan' => 0,
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);

        DB::table('metode_pembayaran')->insert([
            'metode' => 'QRIS',
            'is_active' => 'Y',
            'potongan' => 0.3,
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);
    }
}
