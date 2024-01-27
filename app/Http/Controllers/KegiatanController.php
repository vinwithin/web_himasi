<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Exception;
use Illuminate\Http\Request;


class KegiatanController extends Controller
{
    public function index(){
        $kegiatan = Kegiatan::all();
        return view('admin/kegiatan',[
            'kegiatan' => $kegiatan,
        ]);
    }
}
