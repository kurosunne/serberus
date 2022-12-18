<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\JanjiTemu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("chat")->truncate();
        Chat::factory()->count(50)->create();
    }
}
