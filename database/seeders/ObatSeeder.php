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
                    'ob_nama' => 'Trenmeza',
                    'ob_kandunganVal' => NULL,
                    'ob_kandunganSatuan' => NULL,
                    'ob_harga' => 20000,
                    'to_id' => 2,
                ],
                [
                    'ob_nama' => 'Cetirizine ',
                    'ob_kandunganVal' => 10,
                    'ob_kandunganSatuan' => "mg",
                    'ob_harga' => 8000,
                    'to_id' => 2,
                ],
                [
                    'ob_nama' => 'Panadol Extra',
                    'ob_kandunganVal' => NULL,
                    'ob_kandunganSatuan' => NULL,
                    'ob_harga' => 10000,
                    'to_id' => 2,
                ],
                [
                    'ob_nama' => 'Sangobion',
                    'ob_kandunganVal' => NULL,
                    'ob_kandunganSatuan' => NULL,
                    'ob_harga' => 10000,
                    'to_id' => 1,
                ],
                [
                    'ob_nama' => 'Epexol ',
                    'ob_kandunganVal' => 30,
                    'ob_kandunganSatuan' => "mg",
                    'ob_harga' => 10000,
                    'to_id' => 2,
                ],
                [
                    'ob_nama' => 'Acetylcysteine',
                    'ob_kandunganVal' => 200,
                    'ob_kandunganSatuan' => "mg",
                    'ob_harga' => 20000,
                    'to_id' => 1,
                ],
                [
                    'ob_nama' => 'Acyclovir',
                    'ob_kandunganVal' => 400,
                    'ob_kandunganSatuan' => "mg",
                    'ob_harga' => 10000,
                    'to_id' => 2,
                ],
                [
                    'ob_nama' => 'Bodrex',
                    'ob_kandunganVal' => NULL,
                    'ob_kandunganSatuan' => NULL,
                    'ob_harga' => 10000,
                    'to_id' => 2,
                ],
                [
                    'ob_nama' => 'Ibuprofen',
                    'ob_kandunganVal' => 200,
                    'ob_kandunganSatuan' => "mg",
                    'ob_harga' => 4000,
                    'to_id' => 2,
                ],
                [
                    'ob_nama' => 'Mefinal',
                    'ob_kandunganVal' => 400,
                    'ob_kandunganSatuan' => "mg",
                    'ob_harga' => 18000,
                    'to_id' => 2,
                ],
            ]
        );
    }
}
