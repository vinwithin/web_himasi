<?php

namespace App\Http\Controllers;

use App\Models\Berita;
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
        return view("post_berita");
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'body' => 'required|max:256',
            'image' => 'image|mimes:png,jpg,jpeg|max:1024',
            'category_id' => 'required',
        ],
        [
            "title.required" => "Judul wajib diisi",
            "body.required" => "body harus diisi",
            "image.required" => "image harus diisi",
            "category_id.required" => "category harus diisi",
        ]);
        $validateData["slug"] = Str::slug($request->title);
        $imageName = time() . '_' . $request->image->getClientOriginalName();
        $validateData['image'] = $imageName;
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
        if ($request->hasFile('file')) {
            //get filename with extension
            $filenamewithextension = $request->file('file')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('file')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('file')->storeAs('public/uploads', $filenametostore);

            // you can save image path below in database
            $path = asset('storage/uploads/' . $filenametostore);

            echo $path;
            exit;
        }
    }
}
