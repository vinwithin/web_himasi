<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Berita;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('admin/dashboard',[
            "berita" => Berita::all(),
            "artikel" => Artikel::all(),
            "kegiatan" => Kegiatan::all(),
        ]);
    }
}
