<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Category_berita;
use Illuminate\Support\Str;

class PostBeritaController extends Controller
{
    public function index()
    {
        return view('admin.post_berita', [
            'category_berita' => Category_berita::all(),
            // 'transaksis' => transaksi::get()
        ]);
    }

    public function store(Request $request)
    {

        $validateData = $request->validate(
            [
                'title' => 'required',
                'body' => 'required',
                'image_berita' => 'required|image|mimes:png,jpg,jpeg|max:2024',
                'category_berita_id' => 'required',
            ]
        );
        $validateData["user_id"] = auth()->user()->id;
        $validateData["slug"] = Str::slug($request->title, '-');
        $validateData["excerpt"] = Str::limit(strip_tags($request->body), 200);
        $imageName = time() . '_' . $request->image_berita->getClientOriginalName();
        $validateData['image_berita'] = $imageName;
        $result = Berita::create($validateData);
        //$imageName = $request->image_berita->getClientOriginalName();
        //$request->image_berita->storeAs('public', $imageName)

        if ($result) {
            $request->image_berita->storeAs('public', $imageName);
            return redirect('/berita')->with('success', 'berhasil menambahkan data');
        } else {
            return redirect('/berita/create')->with("error", "Gagal menambahkan data!");
        }
    }
}
