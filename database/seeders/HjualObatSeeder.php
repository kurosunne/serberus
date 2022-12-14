<?php

namespace Database\Seeders;

use App\Models\HjualObat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HjualObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("hjual_obat")->truncate();
        HjualObat::create(
            [
                'ps_id' => 1,
                'ho_status' => "settlement",
                'ho_orderId' => "233746423",
                'ho_grossAmount' => "300000",
                'ho_paymentType' => "gopay",
                'ho_paymentCode' => null,
                'ho_pdfUrl' => null,
            ]
        );
        HjualObat::create(
            [
                'ps_id' => 1,
                'ho_status' => "settlement",
                'ho_orderId' => "1946924402",
                'ho_grossAmount' => "226000",
                'ho_paymentType' => "gopay",
                'ho_paymentCode' => null,
                'ho_pdfUrl' => null,
            ]
        );
        HjualObat::create(
            [
                'ps_id' => 22,
                'ho_status' => "settlement",
                'ho_orderId' => "1734108159",
                'ho_grossAmount' => "100000",
                'ho_paymentType' => "gopay",
                'ho_paymentCode' => null,
                'ho_pdfUrl' => null,
            ]
        );
        HjualObat::create(
            [
                'ps_id' => 11,
                'ho_status' => "settlement",
                'ho_orderId' => "1347648118",
                'ho_grossAmount' => "200000",
                'ho_paymentType' => "gopay",
                'ho_paymentCode' => null,
                'ho_pdfUrl' => null,
            ]
        );
        HjualObat::create(
            [
                'ps_id' => 20,
                'ho_status' => "settlement",
                'ho_orderId' => "381684858",
                'ho_grossAmount' => "198000",
                'ho_paymentType' => "gopay",
                'ho_paymentCode' => null,
                'ho_pdfUrl' => null,
            ]
        );
    }
}
