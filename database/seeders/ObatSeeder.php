<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("obat")->truncate();
        DB::table("obat")->insert(
            [
                [
                    'ob_nama' => '',
                    'ob_beratVal' => 0,
                    'ob_beratSatuan' => "",
                ],
            ]
        );
    }
}
