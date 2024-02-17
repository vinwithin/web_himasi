<?php

namespace App\Http\Controllers\Artikel;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    public function index(){
        if(request()->has('cari')){
            $artikel = Artikel::where('title','like',"%".request()->get('cari')."%")->with('category_artikel')->orderBy('title', 'asc')->paginate(10);
        }
        return view('admin/artikel/index',[
            'artikel' => Artikel::with('category_artikel')->orderBy('title', 'asc')->paginate(10)
            
        ]);
    }
    public function show(Artikel $artikel){
        
        return view('admin/artikel/detail',[
            'artikel' => $artikel->load('category_artikel', 'user'),
           
            
        ]);
    }
   
    
}
