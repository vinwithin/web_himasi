<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Category_artikel;
use Illuminate\Support\Str;

class PostArtikelController extends Controller
{
    public function index()
    {
        return view("admin/post_artikel", [
            'category_artikel' => Category_artikel::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image_artikel' => 'required|image|mimes:png,jpg,jpeg|max:2024',
            'category_artikel_id' => 'required',
        ]);
        $validateData["user_id"] = auth()->user()->id;
        $validateData["slug"] = Str::slug($request->title, '-');
        $validateData["excerpt"] =  Str::limit(strip_tags($request->body), 300);
        $imageName = time() . '_' . $request->image_artikel->getClientOriginalName();
        $validateData['image_artikel'] = $imageName;
        $result = Artikel::create($validateData);
        //$imageName = $request->image_berita->getClientOriginalName();
        //$request->image_berita->storeAs('public', $imageName)

        if ($result) {
            $request->image_artikel->storeAs('public', $imageName);
            return redirect('/artikel')->with('success', 'berhasil menambahkan data');
        } else {
            return redirect('/artikel/create')->with("error", "Gagal menambahkan data!");
        }
    }
}
