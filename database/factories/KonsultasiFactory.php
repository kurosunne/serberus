<?php

namespace Database\Factories;

use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Konsultasi>
 */
class KonsultasiFactory extends Factory
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
            "dk_id" => $this->faker->randomElement(Dokter::all()->pluck(['dk_id'])),
        ];
    }
}
