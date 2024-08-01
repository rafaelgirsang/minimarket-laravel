<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penjualan_status')->insert(
            [
                [
                    'status' => 'Antri',
                    'color' => 'warning',
                    'sort' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'status' => 'Cuci',
                    'color' => 'primary',
                    'sort' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'status' => 'Setrika',
                    'color' => 'info',
                    'sort' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'status' => 'Packing',
                    'color' => 'success',
                    'sort' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'status' => 'Selesai',
                    'color' => 'secondary',
                    'sort' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'status' => 'Cancel',
                    'color' => 'danger',
                    'sort' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],

            ]
        );
    }
}
