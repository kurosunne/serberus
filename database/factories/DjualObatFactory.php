<?php

namespace Database\Factories;

use App\Models\HjualObat;
use App\Models\Obat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DjualObat>
 */
class DjualObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $obatId = $this->faker->randomElement(Obat::all()->pluck(['ob_id']));
        $obatStok = $this->faker->numberBetween(1,10);
        $obatTotal = Obat::find($obatId)->first()->ob_harga * $obatStok;
        return [
            'ho_id' => $this->faker->randomElement(HjualObat::all()->pluck(['ho_id'])),
            'do_stok' => $obatStok,
            'ob_id' => $obatId,
            'do_total' => $obatTotal
        ];
    }
}
