<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call(TipeObatSeeder::class);
        $this->call(ObatSeeder::class);
        $this->call(SpesialisSeeder::class);
        $this->call(RumahSakitSeeder::class);
        $this->call(PasienSeeder::class);
        $this->call(DokterSeeder::class);
        $this->call(PerawatSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
