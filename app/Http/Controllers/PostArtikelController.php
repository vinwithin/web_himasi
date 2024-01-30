<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Category_artikel;
use Exception;
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

        try{
            $result = Artikel::create($validateData);
            if ($result) {
                $request->image_artikel->storeAs('public', $imageName);
                return redirect('/artikel')->with('success', 'berhasil menambahkan data');
            } else {
                return redirect('/artikel/create')->with("error", "Gagal menambahkan data!");
            }
        }catch(Exception $e){
        return redirect()->to('artikel')->with("slugerror", "Gagal menambahkan data! masukkan judul yang lain!");
        };
    }
    public function destroy($id){
        Artikel::where('id', $id)->delete(); 
        return redirect('/artikel')->with('success', 'Artikel Berhasil Dihapus!');
    }
    public function edit(Artikel $artikel)
    {
        $category_artikel = Category_artikel::all();
	    return view('edit/artikel_update',['artikel' => $artikel, 'category_artikel' => $category_artikel]);
    }
    public function update(Request $request, Artikel $artikel){
        $validateData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image_artikel' => 'required|image|mimes:png,jpg,jpeg|max:2024',
            'category_artikel_id' => 'required',
        ]);
        $validateData["slug"] = Str::slug($request->title, '-');
        $validateData["excerpt"] =  Str::limit(strip_tags($request->body), 300);
        $imageName = time() . '_' . $request->image_artikel->getClientOriginalName();
        $validateData['image_artikel'] = $imageName;

        $result = Artikel::where('id', $artikel->id)
                  ->update($validateData);
        if ($result) {
            $request->image_artikel->storeAs('public', $imageName);
            return redirect('/artikel')->with('success', 'berhasil mengubah data');
        } else {
            return redirect('/artikel/create')->with("error", "Gagal mengubah data!");
        }
    }
}
