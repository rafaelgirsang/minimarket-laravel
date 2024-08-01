<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produk_kategori')->insert([
            'kategori' => 'Makanan',
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);
        DB::table('produk_kategori')->insert([
            'kategori' => 'Minuman',
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);
        DB::table('produk_kategori')->insert([
            'kategori' => 'Rokok',
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);
        DB::table('produk_kategori')->insert([
            'kategori' => 'Alat Mandi',
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);
    }
}
