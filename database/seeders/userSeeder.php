<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            "name" => "Ristek Himasi",
            "email" => "ristekhimasi@gmail.com",
            "password" => bcrypt("ristekbisa2024"),
         ]);
    }
}
