<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurnalAkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jurnal_akun')->insert([
            'kode' => '1',
            'akun' => 'Kas',
            'saldo_normal' => 'DEBIT',
            'kategori_id' => 1,
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);
        DB::table('jurnal_akun')->insert([
            'kode' => '2',
            'akun' => 'Pembelian Persediaan (Stok)',
            'saldo_normal' => 'DEBIT',
            'kategori_id' => 1,
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);

        DB::table('jurnal_akun')->insert([
            'kode' => '2',
            'akun' => 'Piutang',
            'saldo_normal' => 'DEBIT',
            'kategori_id' => 1,
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);
        DB::table('jurnal_akun')->insert([
            'kode' => '2',
            'akun' => 'Peralatan/Perlengkapan',
            'saldo_normal' => 'DEBIT',
            'kategori_id' => 2,
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);

        DB::table('jurnal_akun')->insert([
            'kode' => '2',
            'akun' => 'Utang Dagang',
            'saldo_normal' => 'KREDIT',
            'kategori_id' => 3,
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);
        DB::table('jurnal_akun')->insert([
            'kode' => '2',
            'akun' => 'Modal Usaha',
            'saldo_normal' => 'Kredit',
            'kategori_id' => 4,
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);
        DB::table('jurnal_akun')->insert([
            'kode' => '2',
            'akun' => 'Pendapatan Penjualan',
            'saldo_normal' => 'KREDIT',
            'kategori_id' => 5,
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);

        DB::table('jurnal_akun')->insert([
            'kode' => '2',
            'akun' => 'Biaya Administrasi',
            'saldo_normal' => 'DEBIT',
            'kategori_id' => 6,
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);

        DB::table('jurnal_akun')->insert([
            'kode' => '2',
            'akun' => 'Biaya Listrik',
            'saldo_normal' => 'DEBIT',
            'kategori_id' => 6,
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);
        DB::table('jurnal_akun')->insert([
            'kode' => '2',
            'akun' => 'Biaya Transportasi',
            'saldo_normal' => 'DEBIT',
            'kategori_id' => 6,
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);
        DB::table('jurnal_akun')->insert([
            'kode' => '2',
            'akun' => 'Biaya Wifi',
            'saldo_normal' => 'DEBIT',
            'kategori_id' => 6,
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);
    }
}
