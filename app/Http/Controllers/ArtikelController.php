<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Category_artikel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index()
    {
        return view("post_artikel", [
            'category_artikel' => Category_artikel::all(),
        ]);
    }

    public function store(Request $request)
    {
            $validateData = $request->validate([
                'title' => 'required',
                'body' => 'required|max:256',
                'image_artikel' => 'required|image|mimes:png,jpg,jpeg|max:2024',
                'category_artikel_id' => 'required',
            ],
            [
                "title.required" => "Judul wajib diisi",
                "body.required" => "Deskripsi harus diisi",
                "image_artikel.required" => "Silakan unggah gambar",
                "image_artikel.image" => "Gambar harus berformat png, jpg, atau jpeg",
                "image_artikel.max" => "Ukuran gambar tidak boleh melebihi 2 mb",
                "category_artikel_id.required" => "category harus diisi",
            ]);
            $validateData["user_id"] = auth()->user()->id;
            $validateData["slug"] = Str::slug($request->title, '-');
            $validateData["excerpt"] = Str::of($request->body)->limit(20);
            $imageName = time() . '_' . $request->image_artikel->getClientOriginalName();
            $validateData['image_artikel'] = $imageName;
            $result = Artikel::create($validateData);
            //$imageName = $request->image_berita->getClientOriginalName();
            //$request->image_berita->storeAs('public', $imageName)

            if ($result) {
                $request->image_artikel->storeAs('public', $imageName);
                return "berhasil menambahkan artikel";
            } else {
                return "gagal menambahkan artikel";
            }
      
   
    }


}
