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
        DB::table("djual_obat")->insert(
            [
                [
                    'do_stok' => 5,
                    'do_total' => 100000,
                    'ob_id' => 6,
                    'ho_id' => 1,
                ],
                [
                    'do_stok' => 20,
                    'do_total' => 200000,
                    'ob_id' => 3,
                    'ho_id' => 1,
                ],
                [
                    'do_stok' => 7,
                    'do_total' => 126000,
                    'ob_id' => 10,
                    'ho_id' => 2,
                ],
                [
                    'do_stok' => 5,
                    'do_total' => 100000,
                    'ob_id' => 7,
                    'ho_id' => 2,
                ],
                [
                    'do_stok' => 5,
                    'do_total' => 100000,
                    'ob_id' => 1,
                    'ho_id' => 3,
                ],
                [
                    'do_stok' => 10,
                    'do_total' => 200000,
                    'ob_id' => 6,
                    'ho_id' => 4,
                ],
                [
                    'do_stok' => 11,
                    'do_total' => 198000,
                    'ob_id' => 10,
                    'ho_id' => 5,
                ],
            ]
        );
    }
}
