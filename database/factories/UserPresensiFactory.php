<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserPresensiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $number = 1;
        $day = $number++;



       
                if(strlen($day) == 1){            
                    $day = '0'.$day;
                    $tanggal =  '2023-05-'. $day;                 
                    Carbon::setLocale('id');
                    $date = Carbon::parse($tanggal);
                    $hari = $date->isoFormat('dddd');
                }else{                  
                    $tanggal =  '2023-05-'. $day;                  
                    Carbon::setLocale('id');
                    $date = Carbon::parse($tanggal);
                    $hari = $date->isoFormat('dddd');
                }
        
                return [
                    'tanggal' =>  $tanggal,
                    'hari' =>  $hari,
                    'jam_datang' => '08:00',
                    'jam_pulang' => '08:00',
                    'presensi' =>  fake()->randomElement(['hadir', 'izin','sakit']),
                    'shift_id' => fake()->randomElement([1, 2]),
                    'lembur' => fake()->randomElement(['01:00', '00:00','00:30','02:10','00:45','01:10']),
                    'terlambat' => fake()->randomElement(['00:00', '00:00','00:10','00:10','00:13','00:05']),
                    'keterangan' => '-',
                ];

        
        
    }
        

    
}
