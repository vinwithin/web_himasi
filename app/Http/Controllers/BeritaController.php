<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BeritaController extends Controller
{
    public function index(Request $request)
    {   
        $berita = Berita::with(['category_berita'])->paginate(2);

        return view('admin.berita',[
            'berita' => $berita,
        ]);
    }
    


    public function show(Berita $berita)
    {
        return view('admin/show/berita', [
            'berita' => $berita->load('category_berita', 'user')]);  
        
    }
   
}
