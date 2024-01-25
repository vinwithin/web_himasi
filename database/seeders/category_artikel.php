<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class category_artikel extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_artikel')->insert([
            "name" => "Programming",
            "slug" => "programming"
        ]);
        DB::table('category_artikel')->insert([
            "name" => "Serba Serbi IT",
            "slug" => "serba-serbi-it"
        ]);
    }
}
