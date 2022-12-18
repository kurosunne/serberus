<?php

namespace Database\Factories;

use App\Models\Konsultasi;
use App\Models\Obat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ResepDokterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "ks_id" => $this->faker->randomElement(Konsultasi::all()->pluck(['ks_id'])),
            "ob_id" => $this->faker->randomElement(Obat::all()->pluck(['ob_id'])),
            "re_hari" => $this->faker->numberBetween(3,14),
            "re_keterangan" => $this->faker->sentence(),
        ];
    }
}
