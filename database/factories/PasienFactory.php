<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pasien>
 */
class PasienFactory extends Factory
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
        return [
            "ps_nama" => "$firstname $lastname",
            "ps_email" => Str::lower($firstname).Str::lower($lastname)."@gmail.com",
            "ps_telp" => $this->faker->numerify("08##########"),
            "ps_password" => Hash::make("123")
        ];
    }
}
