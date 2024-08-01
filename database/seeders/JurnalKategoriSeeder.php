<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurnalKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jurnal_kategori')->insert([
            'kode' => '11',
            'kategori' => 'Aset Lancar',
            'deskripsi' => 'Debit',
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);
        DB::table('jurnal_kategori')->insert([
            'kode' => '12',
            'kategori' => 'Aset Tetap',
            'deskripsi' => 'Debit',
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);
        DB::table('jurnal_kategori')->insert([
            'kode' => '21',
            'kategori' => 'Liabilitas',
            'deskripsi' => 'Kredit',
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);
        DB::table('jurnal_kategori')->insert([
            'kode' => '31',
            'kategori' => 'Ekuitas',
            'deskripsi' => 'Kredit',
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);
        DB::table('jurnal_kategori')->insert([
            'kode' => '41',
            'kategori' => 'Pendapatan',
            'deskripsi' => 'Kredit',
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);
        DB::table('jurnal_kategori')->insert([
            'kode' => '51',
            'kategori' => 'Biaya',
            'deskripsi' => 'Debit',
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);
    }
}
