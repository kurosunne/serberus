<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpesialisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("spesialis")->truncate();
        DB::table("spesialis")->insert(
            [
                [
                    'sp_nama' => 'Umum'
                ],
                [
                    'sp_nama' => 'Anak'
                ],
                [
                    'sp_nama' => 'Mata'
                ]
            ]
        );
    }
}
