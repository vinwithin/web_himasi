<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    public function index(){
        $artikel = Artikel::with('category_artikel')->paginate(10);
        return view('admin/artikel',[
            'artikel' => $artikel,
        ]);
    }
    public function show(Artikel $artikel){
        
        return view('admin/show/artikel',[
            'artikel' => $artikel->load('category_artikel', 'user'),
           
            
        ]);
    }
    public function search(Request $request){
        $cari = $request->cari;
        $artikel = Artikel::where('title','like',"%".$cari."%")->with('category_artikel')->paginate(10);
		return view('admin/artikel',[
            'artikel' => $artikel,
        ]);
		
    }
    public function check(){
        $firstRow = Artikel::select('body')->first();

        $imageTags = [];

        if ($firstRow) {
            // Use regular expression to extract img tags
            preg_match_all('/storage[^>]+(png|jpg|jpeg)/i', $firstRow->body, $matches);

            // Add extracted img tags to the array
            $imageTags = $matches[0];
        }

        // Now $imageTags array contains all the img tags from the first row of the database column
        foreach($imageTags as $img){
            unlink($img);
        }
            return $imageTags;
        
    }
    
}
