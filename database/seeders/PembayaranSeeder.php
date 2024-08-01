<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Unique;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {



        DB::table('pembayaran')->insert(
            [
                [
                    'tanggal' => date('Y-m-d'),
                    'total_harga' => 12000,
                    'kode' => strtoupper("11" . substr(uniqid(), 3)),
                   
                    'tanggal_lunas' => date('Y-m-d'),
                    'bayar_lunas' => 0,
                    'diskon' => 0,
                    'status' => 1,
                    'metode_id' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],

                [
                    'tanggal' => date('Y-m-d'),
                    'total_harga' => 17000,
                    'kode' => strtoupper("11" . substr(uniqid(), 3)),
                   
                    'tanggal_lunas' => date('Y-m-d'),
                    'bayar_lunas' => 7000,
                    'diskon' => 0,
                    'status' => 2,
                     'metode_id' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'tanggal' => date('Y-m-d'),
                    'total_harga' => 10000,
                    'kode' => strtoupper("11" . substr(uniqid(), 3)),
               
                    'tanggal_lunas' => date('Y-m-d'),
                    'bayar_lunas' => 0,
                    'diskon' => 0,
                    'status' => 0,
                     'metode_id' => 2,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'tanggal' => date('Y-m-d'),
                    'total_harga' => 4000,
                    'kode' => strtoupper("11" . substr(uniqid(), 3)),                  
                    'tanggal_lunas' => date('Y-m-d'),
                    'bayar_lunas' => 0,
                    'diskon' => 0,
                    'status' => 1,
                    'metode_id' => 3,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],

            ]
        );
    }
}
