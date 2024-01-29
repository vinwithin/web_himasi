<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Exception;


class ArtikelController extends Controller
{
    public function index(){
        $artikel = Artikel::with('category_artikel')->paginate(10);
        return view('admin/artikel',[
            'artikel' => $artikel,
        ]);
    }
    public function show(Artikel $artikel){
        return view('admin/show/artikel',[
            'artikel' => $artikel->load('category_artikel', 'user'),
        ]);
    }
    
}
