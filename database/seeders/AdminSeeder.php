<?php

namespace Database\Seeders;

use App\Models\Admin;
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
        $data = [
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
        ];
        for ($i=0; $i < count($data); $i++) {
            Admin::create($data[$i]);
        }
    }
}
