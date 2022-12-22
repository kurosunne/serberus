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
                'ho_alamat' => '21390 Kuhic Crossing Suite 696 Raymondburgh, ND 04481-0678',
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
                'ho_alamat' => '769 Jacky Rapid Arjunburgh, IN 63099-0745',
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
                'ho_alamat' => '4452 Stracke Meadows McGlynnland, ME 12735-9117',
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
                'ho_alamat' => '74155 Lela Via Apt. 088 Maybelltown, TN 68202',
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
                'ho_alamat' => '4993 Lonie Loaf South Loren, MS 19959',
                'ho_orderId' => "381684858",
                'ho_grossAmount' => "198000",
                'ho_paymentType' => "gopay",
                'ho_paymentCode' => null,
                'ho_pdfUrl' => null,
            ]
        );
    }
}
