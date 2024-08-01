<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $bil = rand(); // Inisialisasi variabel bil dengan nilai 10
        if ($bil % 2 == 0) { //Kondisi
            $name = fake()->name('male');
            $gender = 'L';
        } else {
            $name = fake()->name('female');
            $gender = 'P';
        }
        $password = '12345';

        $tanggalLahir = fake()->dateTimeBetween($startDate = '-30 years', $endDate = '-20 years', $timezone = null);
        $date = Carbon::parse($tanggalLahir);
        $tanggalLahir = $date->isoFormat('Y-MM-DD');

        $tanggalMasuk = fake()->dateTimeBetween($startDate = '-2 years', $endDate = '-1 years', $timezone = null);
        $date = Carbon::parse($tanggalMasuk);
        $tanggalMasuk = $date->isoFormat('Y-MM-DD');


        $tanggalKeluar = fake()->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null);
        $date = Carbon::parse($tanggalKeluar);
        $tanggalKeluar = $date->isoFormat('Y-MM-DD');


        $phone = ('08' . fake()->randomElement([95, 21, 23, 19, 96, 12, 58, 17]) . random_int(10000000, 99999999));
        DB::table('user')->insert([
            'nama_user' =>  'Admin',
            'telpon' =>  $phone,
            'email' => 'admin@gmail.com', // password
            'password' => Hash::make($password),
            'is_active' => 'Y',
            'role_id' => 1,
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);

        DB::table('user')->insert([
            'nama_user' =>  'Aditya',
            'telpon' =>  $phone,
            'email' => 'owner@gmail.com', // password
            'password' => Hash::make($password),
            'is_active' => 'Y',
            'role_id' => 2,
            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);

       

          DB::table('user')->insert([
            'nama_user' =>  'Staff ',
         
            'telpon' =>  $phone,
          
            'email' => 'staff@gmail.com', // password
            'password' => Hash::make($password),
          
            'is_active' => 'Y',
            'role_id' => 3,

            'created_at' =>  timestamp(),
            'updated_at' =>  timestamp()
        ]);


        


        // User::factory(10)->create();
    }
}