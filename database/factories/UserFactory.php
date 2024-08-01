<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
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
        return [
            'nama' =>   $name,
            'nik' =>  random_int(1000000000000000, 9999999999999999),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' =>  $tanggalLahir,
            'jenis_kelamin' =>  $gender,
            'telpon' =>  $phone,
            'alamat' => fake()->address(),
            'email' => fake()->unique()->safeEmail(), // password
            'password' => Hash::make($password),
            'tanggal_masuk' =>  $tanggalMasuk,
            'tanggal_keluar' =>  $tanggalKeluar,
            'is_active' => fake()->randomElement(['Y', 'N']),
            'role_id' => fake()->randomElement([1, 2, 3]),
            'cabang_id' => fake()->randomElement([1, 2, 3]),
        ];
    }
}