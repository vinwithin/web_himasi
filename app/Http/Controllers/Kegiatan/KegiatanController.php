<?php

namespace App\Http\Controllers\Kegiatan;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Exception;
use Illuminate\Http\Request;


class KegiatanController extends Controller
{
    public function index(){
        if(request()->has('cari')){
            $kegiatan = Kegiatan::where('title','like',"%".request()->get('cari')."%")->orderBy('title', 'asc')->paginate(10);
        }
        return view('admin/kegiatan/index',[
            'kegiatan' =>        Kegiatan::orderBy('title', 'asc')->paginate(10),
        ]);
    }
    public function show(Kegiatan $kegiatan)
    {
        return view('admin/kegiatan/detail', ['kegiatan' => $kegiatan]);  
        
    }
    
}
