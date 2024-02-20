<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class guestArtikelController extends Controller
{
    public function index(){
        return view('guest/artikel/index',[
            "artikel" => Artikel::with(['category_artikel','user'])->orderBy('updated_at', 'asc')->paginate(10),

        ]);
    }
    public function show(Artikel $artikel){
        return view('guest/artikel/detail', [
            'artikel' => $artikel->load('category_artikel', 'user'), 
        ]);
    }
}
