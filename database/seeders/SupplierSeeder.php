<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {

        Supplier::factory(20)->create();


        // $phone = ('08' . fake()->randomElement([95, 21, 23, 19, 96, 12, 58, 17]) . random_int(10000000, 99999999));
        // DB::table('supplier')->insert([
        //     'nama_supplier' => 'Makanan',
        //     'telpon' =>  $phone,
        //     'alamat' => 'Makanan',
        //     'created_at' =>  timestamp(),
        //     'updated_at' =>  timestamp()
        // ]);
        // DB::table('supplier')->insert([
        //     'kategori' => 'Minuman',
        //     'created_at' =>  timestamp(),
        //     'updated_at' =>  timestamp()
        // ]);
        // DB::table('supplier')->insert([
        //     'kategori' => 'Rokok',
        //     'created_at' =>  timestamp(),
        //     'updated_at' =>  timestamp()
        // ]);
        // DB::table('supplier')->insert([
        //     'kategori' => 'Alat Mandi',
        //     'created_at' =>  timestamp(),
        //     'updated_at' =>  timestamp()
        // ]);
    }
}
