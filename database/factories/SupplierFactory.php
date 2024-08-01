<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $phone = ('08' . fake()->randomElement([95, 21, 23, 19, 96, 12, 58, 17]) . random_int(10000000, 99999999));
        return [
            'nama_supplier' =>  fake()->name(),
            'telpon' =>  $phone,
            'alamat' =>  fake()->address(),
            // 'created_at' =>  timestamp(),
            // 'updated_at' =>  timestamp()
        ];
    }
}
