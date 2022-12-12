<?php

namespace Database\Seeders;

use App\Models\HjualObat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HjualObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("hjual_obat")->truncate();
        HjualObat::factory()->count(5)->create();
    }
}
