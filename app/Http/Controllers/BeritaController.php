<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function berita(Request $request){
        
        $validateData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image_berita' => 'image|mimes:png,jpg,jpeg|max:1024',
            'category_id' => 'required',
        ]);
        $validateData["slug"] = Str::slug($request->title);
        $imageName = time() . '_' . $request->image_berita->getClientOriginalName();
        $validateData['image_berita'] = $imageName;
        $result = Berita::create($validateData);
        //$imageName = $request->image_berita->getClientOriginalName();
        //$request->image_berita->storeAs('public', $imageName)
       
        if($result){
            $request->image_berita->storeAs('public', $imageName);
            return "berhasil menambahkan berita";
        }else{
            return "gagal menambahkan berita";
        }
    }
    public function index(){
        return view("post_berita");
    }
}
