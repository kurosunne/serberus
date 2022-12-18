<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dokter>
 */
class DokterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $firstname = $this->faker->firstName();
        $lastname = $this->faker->lastName();
        $spesialis = DB::select("select count(*) as count from spesialis");
        $rumahsakit = DB::select("select count(*) as count from rumah_sakit");
        return [
            "dk_nama" => "$firstname $lastname",
            "dk_email" => Str::lower($firstname).Str::lower($lastname)."@gmail.com",
            "dk_telp" => $this->faker->numerify("08##########"),
            "dk_password" => Hash::make("123"),
            "sp_id" => $this->faker->numberBetween(1,$spesialis[0]->count),
            "rs_id" => $this->faker->numberBetween(1,$rumahsakit[0]->count)
        ];
    }
}
