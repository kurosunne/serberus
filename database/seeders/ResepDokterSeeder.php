<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\ResepDokter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResepDokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("resep_dokter")->truncate();
        ResepDokter::factory()->count(20)->create();
    }
}
