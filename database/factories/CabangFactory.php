<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cabang>
 */
class CabangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kode = 'CB-01';
        $phone = '089637650413';
        return [
            'nama' => 'Sleman',
            'kode' =>  $kode,
            'alamat' =>  'Jl. Sepabola Noa 134 A Seturan',
            'maps' => fake()->longitude($min = -180, $max = 180),
            'telp' => $phone,
            'is_active' => 'Y',
        ];

        //  $kode = 'CB-01';
        // $phone = ('08' . fake()->randomElement([95, 21, 23, 19, 96, 12, 58, 17]) . random_int(10000000, 99999999));
        // return [
        //     'nama' => fake()->city(),
        //     'kode' =>  $kode,
        //     'alamat' =>  fake()->address(),
        //     'maps' => fake()->longitude($min = -180, $max = 180),
        //     'telp' => $phone,
        //     'is_active' => fake()->randomElement($array = ['Y', 'N']),
        // ];
    }
}
