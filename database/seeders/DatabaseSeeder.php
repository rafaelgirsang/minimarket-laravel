<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([

            UserRoleSeeder::class,
            UserSeeder::class,
            ProdukKategoriSeeder::class,
            JurnalKategoriSeeder::class,
            JurnalAkunSeeder::class,
            SaldoBelanjaSeeder::class,
            // SupplierSeeder::class,
            MetodePembayaranSeeder::class,




        ]);
    }
}
