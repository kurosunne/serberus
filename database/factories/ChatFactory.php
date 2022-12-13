<?php

namespace Database\Factories;

use App\Models\Konsultasi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chat>
 */
class ChatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "ch_sender_is_dokter" => $this->faker->numberBetween(0,1),
            "ks_id" => $this->faker->randomElement(Konsultasi::all()->pluck(['ks_id'])),
            "ch_teks" => $this->faker->sentence(),
        ];
    }
}
