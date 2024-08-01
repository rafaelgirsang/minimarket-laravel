<?php

namespace Database\Seeders;

use App\Models\UserSetGaji;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSetGajiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserSetGaji::factory(20)->create();
    }
}
