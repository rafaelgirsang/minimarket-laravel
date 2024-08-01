<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_role')->insert([
            'role' => 'Developer', 
            'created_at' =>  Carbon::now(),       
            'updated_at' =>  Carbon::now()           
        ]);
        DB::table('user_role')->insert([
            'role' => 'Owner',
            'created_at' =>  timestamp(),       
            'updated_at' =>  timestamp()   
        ]);
        DB::table('user_role')->insert([
            'role' => 'Staff',
            'created_at' =>  timestamp(),       
            'updated_at' =>  timestamp()   
        ]);
     
       
    }
}
