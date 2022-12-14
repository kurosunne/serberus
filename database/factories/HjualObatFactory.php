<?php

namespace Database\Factories;

use App\Models\Pasien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HjualObat>
 */
class HjualObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $psId = $this->faker->randomElement(Pasien::all()->pluck(['ps_id']));
        return [
            "ps_id" => $psId,
            "ho_status" => "settlement",
            "ho_orderId" => rand(),
            "ho_grossAmount" => 0,
            "ho_paymentType" => "gopay",
            "ho_paymentCode" => null,
            "ho_pdfUrl" => null,
        ];
    }
}
