<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Exception;
use Illuminate\Http\Request;


class KegiatanController extends Controller
{
    public function index(){
        $kegiatan = Kegiatan::paginate(10);
        return view('admin/kegiatan',[
            'kegiatan' => $kegiatan,
        ]);
    }
    public function show(Kegiatan $kegiatan)
    {
        return view('admin/show/kegiatan', ['kegiatan' => $kegiatan]);  
        
    }

    public function search(Request $request){
        $cari = $request->cari;
        $kegiatan = Kegiatan::where('title','like',"%".$cari."%")->paginate(10);
		return view('admin/kegiatan',[
            'kegiatan' => $kegiatan,
        ]);
		
    }
    
}
