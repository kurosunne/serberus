<?php

namespace Database\Seeders;

use App\Models\Perawat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerawatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("perawat")->truncate();
        Perawat::factory()->count(25)->create();
    }
}
