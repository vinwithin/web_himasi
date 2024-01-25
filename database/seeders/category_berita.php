<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class category_berita extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category_berita')->insert([
           "name" => "Prestasi Mahasiswa",
           "slug" => "prestasi-mahasiswa"
        ]);
        DB::table('category_berita')->insert([
           "name" => "Kampus Merdeka",
           "slug" => "kampus-merdeka"
        ]);
        DB::table('category_berita')->insert([
           "name" => "Beasiswa",
           "slug" => "beasiswa"
        ]);
        DB::table('category_berita')->insert([
           "name" => "Kompetisi",
           "slug" => "kompetisi"
        ]);
    }
}
