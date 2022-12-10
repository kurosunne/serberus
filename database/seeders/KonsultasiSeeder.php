<?php

namespace Database\Seeders;

use App\Models\Konsultasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KonsultasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("konsultasi")->truncate();
        Konsultasi::factory()->count(25)->create();
    }
}
