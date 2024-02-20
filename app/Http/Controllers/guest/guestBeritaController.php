<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Berita;
use Illuminate\Http\Request;

class guestBeritaController extends Controller
{
    public function index(){

        return view('guest/berita/index',[
            "berita" =>  Berita::with(['category_berita','user'])->orderBy('updated_at', 'asc')->paginate(10),
            
        ]);
    }
    public function show(Berita $berita){
        return view('guest/berita/detail', [
            'berita' => $berita->load('category_berita', 'user'),
           
            
        ]);
    }
}
