<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perawat>
 */
class PerawatFactory extends Factory
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
        $rumahsakit = DB::select("select count(*) as count from rumah_sakit");
        return [
            "pr_nama" => "$firstname $lastname",
            "pr_email" => Str::lower($firstname).Str::lower($lastname)."@gmail.com",
            "pr_telp" => $this->faker->numerify("08##########"),
            "pr_password" => Hash::make("123"),
            "rs_id" => $this->faker->numberBetween(1,$rumahsakit[0]->count)
        ];
    }
}
