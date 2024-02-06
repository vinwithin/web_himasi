<?php

namespace App\Http\Controllers\Berita;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BeritaController extends Controller
{
    public function index()
    {   
        $berita = Berita::with(['category_berita'])->orderBy('title', 'asc')->paginate(10);
        if(request()->has('cari')){
            $berita = Berita::where('title','like',"%".request()->get('cari')."%")->with('category_berita')->orderBy('title', 'asc')->paginate(10);
        }
        return view('admin/berita/index',[
            'berita' => $berita,
        ]);
    }
    


    public function show(Berita $berita)
    {
        return view('admin/berita/detail', [
            'berita' => $berita->load('category_berita', 'user')]);  
        
    }

   
}
