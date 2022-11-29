<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipeObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("tipe_obat")->truncate();
        DB::table("tipe_obat")->insert(
            [
                [
                    'to_nama' => 'Kapsul',
                ],
                [
                    'to_nama' => 'Tablet',
                ],
                [
                    'to_nama' => 'Bubuk',
                ],
                [
                    'to_nama' => 'Sirup',
                ],
            ]
        );
    }
}
