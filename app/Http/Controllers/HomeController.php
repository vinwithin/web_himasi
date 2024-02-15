<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Berita;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $total_artikel = Artikel::select(DB::raw("COUNT(*) as jumlah_artikel"))
        ->GroupBy(DB::raw("MONTH(created_at)"))
        ->pluck('jumlah_artikel');
        $total_berita = Berita::select(DB::raw("COUNT(*) as jumlah_berita"))
        ->GroupBy(DB::raw("MONTH(created_at)"))
        ->pluck('jumlah_berita');
        $total_kegiatan = Kegiatan::select(DB::raw("COUNT(*) as jumlah_kegiatan"))
        ->GroupBy(DB::raw("MONTH(created_at)"))
        ->pluck('jumlah_kegiatan');
    
        //mengambil data bulan 
        $bulan = Artikel::select(DB::raw('MONTHNAME(created_at) as bulan'))
        ->GroupBy(DB::raw("MONTHNAME(created_at)"))
        ->pluck('bulan');
        return view('admin/dashboard',[
            "berita" => Berita::all(),
            "artikel" => Artikel::all(),
            "kegiatan" => Kegiatan::all(),
            "total_artikel" => $total_artikel,
            "total_berita" => $total_berita,
            "total_kegiatan" => $total_kegiatan,
            "bulan" => $bulan
        ]);
    }

    
}
