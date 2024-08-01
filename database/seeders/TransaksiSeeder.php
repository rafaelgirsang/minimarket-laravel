<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $date =  Carbon::now();
        $deadline1 = $date->addHours(12);
        $deadline2 = $date->addHours(72);
        $deadline3 = $date->addHours(24);
        $deadline4 = $date->addHours(6);
        DB::table('transaksi')->insert(
            [

                [
                    'tanggal' => date('Y-m-d'),
                    'jasa' => 'Cuci + Setrika',
                    'jumlah' => 3,
                    'harga' => 4000,
                    'satuan' => 1,
                    'deadline' => $deadline1,
                    'deadline_jam' => 2,
                    'tipe_waktu' => 1,
                    'invoice' => 13432413,
                    'jasa_id' => 1,
                    'status_id' => 1,
                    'customer_id' => 1,
                    'pembayaran_id' => 1,
                    'cabang_id' => 1,
                    'user_id' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'tanggal' => date('Y-m-d'),
                    'jasa' => 'Cuci + Setrika',
                    'jumlah' => 3,
                    'harga' => 4000,
                    'satuan' => 1,
                    'deadline' => $deadline1,
                     'deadline_jam' => 2,
                    'tipe_waktu' => 1,
                    'invoice' => 13432413,
                    'jasa_id' => 1,
                    'status_id' => 1,
                    'customer_id' => 1,
                    'pembayaran_id' => 1,
                    'cabang_id' => 1,
                    'user_id' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'tanggal' => date('Y-m-d'),
                    'jasa' => 'Cuci + Setrika',
                    'jumlah' => 3,
                    'harga' => 4000,
                    'satuan' => 1,
                    'deadline' => $deadline2,
                     'deadline_jam' => 2,
                    'tipe_waktu' => 1,
                    'invoice' => 13432413,
                    'status_id' => 1,
                    'jasa_id' => 1,
                    'customer_id' => 2,
                    'pembayaran_id' => 2,
                    'cabang_id' => 1,
                    'user_id' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'tanggal' => date('Y-m-d'),
                    'jasa' => 'Sprei Kecil/Sedang',
                    'jumlah' => 1,
                    'harga' => 5000,
                    'satuan' => 2,
                    'deadline' => $deadline3,
                     'deadline_jam' => 2,
                    'tipe_waktu' => 1,
                    'invoice' => 13432413,
                    'jasa_id' => 7,
                    'status_id' => 2,
                    'customer_id' => 2,
                    'pembayaran_id' => 2,
                    'cabang_id' => 1,
                    'user_id' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'tanggal' => date('Y-m-d'),
                    'jasa' => 'Cuci + Setrika',
                    'jumlah' => 1,
                    'harga' => 4000,
                    'satuan' => 1,
                    'deadline' => $deadline4,
                     'deadline_jam' => 2,
                    'tipe_waktu' => 1,
                    'invoice' => 13432413,
                    'jasa_id' => 1,
                    'status_id' => 2,
                    'customer_id' => 3,
                    'pembayaran_id' => 3,
                    'cabang_id' => 1,
                    'user_id' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'tanggal' => date('Y-m-d'),
                    'jasa' => 'One Day',
                    'jumlah' => 1,
                    'harga' => 6000,
                    'satuan' => 1,
                    'deadline' => $date->addHours(24),
                     'deadline_jam' => 2,
                    'tipe_waktu' => 1,
                    'invoice' => 13432413,
                    'jasa_id' => 4,
                    'status_id' => 3,
                    'customer_id' => 3,
                    'pembayaran_id' => 3,
                    'cabang_id' => 1,
                    'user_id' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
                [
                    'tanggal' => date('Y-m-d'),
                    'jasa' => 'Cuci Setrika',
                    'jumlah' => 1,
                    'harga' => 4000,
                    'satuan' => 2,
                    'deadline' => $date->addHours(72),
                     'deadline_jam' => 2,
                    'tipe_waktu' => 1,
                    'invoice' => 13432413,
                    'jasa_id' => 1,
                    'status_id' => 4,
                    'customer_id' => 4,
                    'pembayaran_id' => 4,
                    'cabang_id' => 1,
                    'user_id' => 1,
                    'created_at' =>  timestamp(),
                    'updated_at' =>  timestamp()
                ],
            ],

        );
    }
}
