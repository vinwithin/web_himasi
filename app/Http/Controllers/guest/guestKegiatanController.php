<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class guestKegiatanController extends Controller
{
    public function index(){
        return view('guest/kegiatan/index',[
            "kegiatan" => Kegiatan::with(['user'])->orderBy('updated_at', 'asc')->paginate(10),

        ]);
    }
    public function show(Kegiatan $kegiatan){
        return view('guest/kegiatan/detail', [
            'kegiatan' => $kegiatan->load('user'), 
        ]);
    }
}
