<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserSetGaji>
 */
class UserSetGajiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        static $number = 1;
        
        return [
            'pokok' => 2000000,
            'tunjangan' => 500000,
            'insentif' =>  200000,
            'lembur' => 15000,
            'user_id' => $number++,
        ];
    }
}
