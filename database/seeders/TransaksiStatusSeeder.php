<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaksi_status')->insert(
            [
                [
                    'status' => 'Antri',
                    'color' => 'warning',
                    'sort' => 1,
                    'qrcode' => 'antri',
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'status' => 'Cuci',
                    'color' => 'primary',
                    'sort' => 1,
                    'qrcode' => 'cuci',
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'status' => 'Setrika',
                    'color' => 'info',
                    'sort' => 1,
                    'qrcode' => 'setrika',
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'status' => 'Finishing',
                    'color' => 'success',
                    'sort' => 1,
                    'qrcode' => 'finishing',
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'status' => 'Selesai',
                    'color' => 'secondary',
                    'sort' => 1,
                    'qrcode' => 'selesai',
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'status' => 'Cancel',
                    'color' => 'danger',
                    'sort' => 1,
                    'qrcode' => '5rkwjtofkw',
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],

            ]
        );
    }
}
