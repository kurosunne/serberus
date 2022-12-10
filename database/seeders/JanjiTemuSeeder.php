<?php

namespace Database\Seeders;

use App\Models\JanjiTemu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JanjiTemuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("janji_temu")->truncate();
        JanjiTemu::factory()->count(25)->create();
    }
}
