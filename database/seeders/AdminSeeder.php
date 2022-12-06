<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("admin")->truncate();
        DB::table("admin")->insert(
            [
                [
                    'ad_email' => "daniel@gmail.com",
                    'ad_password' => Hash::make("123")
                ],
                [
                    'ad_email' => "mikhael@gmail.com",
                    'ad_password' => Hash::make("123")
                ],
                [
                    'ad_email' => "anderson@gmail.com",
                    'ad_password' => Hash::make("123")
                ],
                [
                    'ad_email' => "ivan@gmail.com",
                    'ad_password' => Hash::make("123")
                ]
            ]
        );
    }
}
