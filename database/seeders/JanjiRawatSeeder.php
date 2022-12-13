<?php

namespace Database\Seeders;

use App\Models\JanjiRawat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JanjiRawatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("janji_rawat")->truncate();
        JanjiRawat::factory()->count(25)->create();
    }
}
