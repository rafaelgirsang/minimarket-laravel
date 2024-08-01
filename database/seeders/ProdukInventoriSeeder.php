<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukInventoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produk')->insert(
            [
                [
                    'produk' => 'TH 5k',
                    'harga' => 5000,
                    'kategori_id' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'produk' => 'TH 10k',
                    'harga' => 10000,
                    'kategori_id' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'produk' => 'TH 15K',
                    'harga' => 15000,
                    'kategori_id' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'produk' => 'TH 20K',
                    'harga' => 20000,
                    'kategori_id' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ]
            ],

        );

        DB::table('produk')->insert(
            [
                [
                    'produk' => 'PK 5k',
                    'harga' => 5000,
                    'kategori_id' => 2,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'produk' => 'PK 10k',
                    'harga' => 10000,
                    'kategori_id' => 2,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'produk' => 'PK 15K',
                    'harga' => 15000,
                    'kategori_id' => 2,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'produk' => 'PK 20K',
                    'harga' => 20000,
                    'kategori_id' => 2,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ]
            ],

        );

        DB::table('produk')->insert(
            [
                [
                    'produk' => 'SP 5k',
                    'harga' => 5000,
                    'kategori_id' => 3,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'produk' => 'SP 10k',
                    'harga' => 10000,
                    'kategori_id' => 3,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'produk' => 'SP 15K',
                    'harga' => 15000,
                    'kategori_id' => 3,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'produk' => 'SP 20K',
                    'harga' => 20000,
                    'kategori_id' => 3,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ]
            ],

        );

        DB::table('produk')->insert(
            [
                [
                    'produk' => 'SK 5k',
                    'harga' => 5000,
                    'kategori_id' => 4,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'produk' => 'SK 10k',
                    'harga' => 10000,
                    'kategori_id' => 4,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'produk' => 'SK 15K',
                    'harga' => 15000,
                    'kategori_id' => 4,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'produk' => 'SK 20K',
                    'harga' => 20000,
                    'kategori_id' => 4,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ]
            ],

        );
    }
}
