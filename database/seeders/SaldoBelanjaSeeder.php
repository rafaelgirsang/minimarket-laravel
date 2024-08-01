<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaldoBelanjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('saldo_belanja')->insert([
            'saldo' => 0,

            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);
    }
}
