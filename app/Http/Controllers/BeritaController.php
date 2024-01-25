<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Category_berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function berita(Request $request)
    {

        // $validateData = $request->validate([
        //     'title' => 'required',
        //     'body' => 'required',
        //     'image_berita' => 'image|mimes:png,jpg,jpeg|max:1024',
        //     'category_id' => 'required',
        // ]);
        // $validateData["slug"] = Str::slug($request->title);
        // $imageName = time() . '_' . $request->image_berita->getClientOriginalName();
        // $validateData['image_berita'] = $imageName;
        // $result = Berita::create($validateData);
        // //$imageName = $request->image_berita->getClientOriginalName();
        // //$request->image_berita->storeAs('public', $imageName)

        // if ($result) {
        //     $request->image_berita->storeAs('public', $imageName);
        //     return "berhasil menambahkan berita";
        // } else {
        //     return "gagal menambahkan berita";
        // }
    }
    public function index()
    {
        return view('post_berita',[
            'category_berita' => Category_berita::all(),
            // 'transaksis' => transaksi::get()
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'body' => 'required|max:256',
            'image_berita' => 'required|image|mimes:png,jpg,jpeg|max:2024',
            'category_berita_id' => 'required',
        ],
        [
            "title.required" => "Judul wajib diisi",
            "body.required" => "body harus diisi",
            "image_berita.required" => "image harus diisi",
            "category_berita_id.required" => "category harus diisi",
        ]);
        $validateData["user_id"] = auth()->user()->id;
        $validateData["slug"] = Str::slug($request->title, '-');
        $validateData["excerpt"] = Str::of($request->body)->limit(20);
        $imageName = time() . '_' . $request->image_berita->getClientOriginalName();
        $validateData['image_berita'] = $imageName;
        $result = Berita::create($validateData);
        //$imageName = $request->image_berita->getClientOriginalName();
        //$request->image_berita->storeAs('public', $imageName)

        if ($result) {
            $request->image_berita->storeAs('public', $imageName);
            return "berhasil menambahkan berita";
        } else {
            return "gagal menambahkan berita";
        }
    }


    public function upload(Request $request)
    {
       
    }
}
