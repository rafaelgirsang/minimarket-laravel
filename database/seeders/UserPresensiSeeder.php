<?php

namespace Database\Seeders;

use App\Models\UserPresensi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPresensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for($i= 1; $i<=20; $i++){
        UserPresensi::factory(30)->create(['user_id' => 1]);
        // UserPresensi::factory(5)->create(['user_id' => 2]);
        // }
    }
}
