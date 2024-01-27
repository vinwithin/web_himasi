<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Exception;
use Illuminate\Http\Request;


class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $berita = Berita::all();
        return view('admin.berita',[
            'berita' => $berita,
        ]);
    }
    


    public function upload(Request $request)
    {
       
    }
}
