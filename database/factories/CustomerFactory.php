<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $bil = rand(); // Inisialisasi variabel bil dengan nilai 10
        if ($bil % 2 == 0) { //Kondisi
            $name = fake()->name('male');
            $gender = 'L';
        } else {
            $name = fake()->name('female');
            $gender = 'P';
        }
        $password = Str::random(10);




        $phone = ('08' . fake()->randomElement([95, 21, 23, 19, 96, 12, 58, 17]) . random_int(10000000, 99999999));
        return [
            'nama' =>   $name,
            // 'gender' =>  $gender,
            // 'kode' =>  '11' . substr(uniqid(), 3),
            'telpon' =>  $phone,
            // 'alamat' => fake()->address(),
            // 'email' => fake()->unique()->safeEmail(), // password
            // 'password' => Hash::make($password),
            // 'is_active' => fake()->randomElement(['Y', 'N']),
            'cabang_id' => 1
        ];
    }
}
