<?php

namespace Database\Factories;

use App\Models\Pasien;
use App\Models\Perawat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JanjiRawat>
 */
class JanjiRawatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "ps_id" => $this->faker->randomElement(Pasien::all()->pluck(['ps_id'])),
            "pr_id" => $this->faker->randomElement(Perawat::all()->pluck(['pr_id'])),
            "jr_tanggal" => $this->faker->dateTimeBetween('now', '+2 weeks'),
        ];
    }
}
