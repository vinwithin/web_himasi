<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Exception;


class ArtikelController extends Controller
{
    public function index(){
        $artikel = Artikel::all();
        return view('admin/artikel',[
            'artikel' => $artikel,
        ]);
    }
}
