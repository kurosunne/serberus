<?php

namespace Database\Seeders;

use App\Models\DjualObat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DjualObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("djual_obat")->truncate();
        DjualObat::factory()->count(10)->create();
    }
}
