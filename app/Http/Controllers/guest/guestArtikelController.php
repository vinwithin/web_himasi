<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Category_artikel;
use Illuminate\Http\Request;

class guestArtikelController extends Controller
{
    public function index(){
        return view('guest/artikel/index',[
            "artikel" => Artikel::with(['category_artikel','user'])->orderBy('updated_at', 'asc')->paginate(10),
            'category_artikel' => Category_artikel::with(['artikel'])->get(),

        ]);
    }
    public function show(Artikel $artikel){
        return view('guest/artikel/detail', [
            'artikel' => $artikel->load('category_artikel', 'user'), 
            'category_artikel' => Category_artikel::with(['artikel'])->get(),
        ]);
    }
}
