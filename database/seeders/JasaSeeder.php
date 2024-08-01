<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('jasa')->insert(
            [
                [
                    'jasa' => 'Customize',
                    'harga' => 10000,
                    'satuan' => 1,
                    'deadline' => 24,                   
                      'waktu' => 2,                 
                    'sort' => 1,                   
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                 [
                    'jasa' => 'Cuci + Setrika',
                    'harga' => 4000,
                    'satuan' => 1,
                    'deadline' => 72,  
                    'waktu' => 2,  
                    'sort' => 0,                     
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'jasa' => 'Cuci Kering',
                    'harga' => 4000,
                    'satuan' => 1,
                    'deadline' => 72,
                     'waktu' => 2,
                     'sort' => 0, 
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'jasa' => 'Setrika ',
                    'harga' => 4000,
                    'satuan' => 1,
                    'deadline' => 72,
                     'waktu' => 2,
                     'sort' => 0, 
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'jasa' => 'One Day',
                    'harga' => 6000,
                    'satuan' => 1,
                    'deadline' => 24,
                     'waktu' => 2,
                     'sort' => 0, 
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'jasa' => 'Express 6 Jam',
                    'harga' => 15000,
                    'satuan' => 1,
                    'deadline' => 6,
                     'waktu' => 1,
                     'sort' => 0, 
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'jasa' => 'Express 4 Jam',
                    'harga' => 20000,
                    'satuan' => 1,
                    'deadline' => 4,
                      'waktu' => 1,
                     'sort' => 0, 
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'jasa' => 'Sprei Kecil/Sedang',
                    'harga' => 6000,
                    'satuan' => 2,
                    'deadline' => 72,
                    'waktu' => 2,
                     'sort' => 0, 
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'jasa' => 'Sprei Besar',
                    'harga' => 10000,
                    'satuan' => 2,
                    'deadline' => 72,
                      'waktu' => 2,
                     'sort' => 0, 
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'jasa' => 'Bedcover Kecil',
                    'harga' => 20000,
                    'satuan' => 2,
                    'deadline' => 72,
                    'waktu' => 2,
                    'sort' => 0, 
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'jasa' => 'Bedcover Sedang',
                    'harga' => 25000,
                    'satuan' => 2,
                    'deadline' => 72,
                      'waktu' => 2,
                     'sort' => 0, 
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'jasa' => 'Bedcover Besar',
                    'harga' => 35000,
                    'satuan' => 2,
                    'deadline' => 72,
                       'waktu' => 2,
                     'sort' => 0, 
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'jasa' => 'Tas',
                    'harga' => 10000,
                    'satuan' => 2,
                    'deadline' => 72,
                       'waktu' => 2,
                     'sort' => 0, 
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'jasa' => 'Boneka',
                    'harga' => 10000,
                    'satuan' => 2,
                    'deadline' => 72,
                    'waktu' => 2,
                     'sort' => 0, 
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ]


            ],

        );
    }
}
