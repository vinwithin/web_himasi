<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Berita;
use App\Models\Category_berita;
use Illuminate\Http\Request;

class guestBeritaController extends Controller
{
    public function index(){

        return view('guest/berita/index',[
            "berita" =>  Berita::with(['category_berita','user'])->orderBy('updated_at', 'asc')->paginate(10),
            'category_berita' => Category_berita::with(['berita'])->get(),
            
        ]);
    }
    public function show(Berita $berita){
        return view('guest/berita/detail', [
            'berita' => $berita->load('category_berita', 'user'),
            'category_berita' => Category_berita::with(['berita'])->get(),
            
        ]);
    }
}
