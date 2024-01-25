<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KegiatanController extends Controller
{
    public function index(){
        return view('post_kegiatan');
    }
    public function store(Request $request){
        
            $validateData = $request->validate([
                'title' => 'required',
                'body' => 'required|max:256',
                'image_kegiatan' => 'required|image|mimes:png,jpg,jpeg|max:2024',
            ],
            [
                "title.required" => "Judul wajib diisi",
                "body.required" => "Deskripsi harus diisi",
                "image_kegiatan.required" => "Silahkan unggah gambar",
                "image_berita.image" => "Gambar harus berformat png, jpg, atau jpeg",
                "image_berita.max" => "Ukuran gambar tidak boleh melebihi 2 mb",
            ]);
            $validateData["user_id"] = auth()->user()->id;
            $validateData["slug"] = Str::slug($request->title, '-');
            $validateData["excerpt"] = Str::of($request->body)->limit(20);
            $imageName = time() . '_' . $request->image_kegiatan->getClientOriginalName();
            $validateData['image_kegiatan'] = $imageName;
            $result = Kegiatan::create($validateData);
            //$imageName = $request->image_berita->getClientOriginalName();
            //$request->image_berita->storeAs('public', $imageName)

            if ($result) {
                $request->image_kegiatan->storeAs('public', $imageName);
                return "berhasil menambahkan kegiatan";
            } else {
                return "gagal menambahkan kegiatan";
            }
        
   
    }
}
