<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produk')->insert(
            [
                [
                    'nama_produk' => 'Tanggo',
                    'barcode' => random_int(1000000000000000, 9999999999999999),
                    'harga_jual' => random_int(5000, 15000),
                    'jumlah_stok' => 0,
                    'kategori_id' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'nama_produk' => 'Nabati',
                    'barcode' => random_int(1000000000000000, 9999999999999999),
                    'harga_jual' => random_int(5000, 15000),
                    'jumlah_stok' => 0,
                    'kategori_id' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'nama_produk' => 'Roma',
                    'barcode' => random_int(1000000000000000, 9999999999999999),
                    'harga_jual' => random_int(5000, 15000),
                    'jumlah_stok' => 0,
                    'kategori_id' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'nama_produk' => 'Sari Gandum',
                    'barcode' => random_int(1000000000000000, 9999999999999999),
                    'harga_jual' => random_int(5000, 15000),
                    'jumlah_stok' => 0,
                    'kategori_id' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ]
            ],

        );

        DB::table('produk')->insert(
            [
                [
                    'nama_produk' => 'Chimori',
                    'barcode' => random_int(1000000000000000, 9999999999999999),
                    'harga_jual' => random_int(5000, 15000),
                    'jumlah_stok' => 0,
                    'kategori_id' => 2,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'nama_produk' => 'Fanta',
                    'barcode' => random_int(1000000000000000, 9999999999999999),
                    'harga_jual' => random_int(5000, 15000),
                    'jumlah_stok' => 0,
                    'kategori_id' => 2,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'nama_produk' => 'Lasgar',
                    'barcode' => random_int(1000000000000000, 9999999999999999),
                    'harga_jual' => random_int(5000, 15000),
                    'jumlah_stok' => 0,
                    'kategori_id' => 2,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'nama_produk' => 'Teh Botol',
                    'barcode' => random_int(1000000000000000, 9999999999999999),
                    'harga_jual' => random_int(5000, 15000),
                    'jumlah_stok' => 0,
                    'kategori_id' => 2,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ]
            ],

        );

        DB::table('produk')->insert(
            [
                [
                    'nama_produk' => 'Gudang Garam',
                    'barcode' => random_int(1000000000000000, 9999999999999999),
                    'harga_jual' => random_int(5000, 15000),
                    'jumlah_stok' => 0,
                    'kategori_id' => 3,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'nama_produk' => 'Sampoerna',
                    'barcode' => random_int(1000000000000000, 9999999999999999),
                    'harga_jual' => random_int(5000, 15000),
                    'jumlah_stok' => 0,
                    'kategori_id' => 3,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'nama_produk' => 'LA Light',
                    'barcode' => random_int(1000000000000000, 9999999999999999),
                    'harga_jual' => random_int(5000, 15000),
                    'jumlah_stok' => 0,
                    'kategori_id' => 3,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'nama_produk' => 'Malboro',
                    'barcode' => random_int(1000000000000000, 9999999999999999),
                    'harga_jual' => random_int(5000, 15000),
                    'jumlah_stok' => 0,
                    'kategori_id' => 3,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ]
            ],

        );

        DB::table('produk')->insert(
            [
                [
                    'nama_produk' => 'Pepsodent',
                    'barcode' => random_int(1000000000000000, 9999999999999999),
                    'harga_jual' => random_int(5000, 15000),
                    'jumlah_stok' => 0,
                    'kategori_id' => 4,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'nama_produk' => 'Lifeboy',
                    'barcode' => random_int(1000000000000000, 9999999999999999),
                    'harga_jual' => random_int(5000, 15000),
                    'jumlah_stok' => 0,
                    'kategori_id' => 4,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'nama_produk' => 'Listerin',
                    'barcode' => random_int(1000000000000000, 9999999999999999),
                    'harga_jual' => random_int(5000, 15000),
                    'jumlah_stok' => 0,
                    'kategori_id' => 4,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'nama_produk' => 'Citra',
                    'barcode' => random_int(1000000000000000, 9999999999999999),
                    'harga_jual' => random_int(5000, 15000),
                    'jumlah_stok' => 0,
                    'kategori_id' => 4,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ]
            ],

        );
    }
}
