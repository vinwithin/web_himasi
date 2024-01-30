<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Category_berita;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostBeritaController extends Controller
{
    public function index()
    {
        return view('admin/post_berita', [
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
        $validateData['slug'] = 'require|unique:berita';
        $validateData["slug"] = Str::slug($request->title, '-');
        $validateData["excerpt"] = Str::limit(strip_tags($request->body), 300);
        $imageName = time() . '_' . $request->image_berita->getClientOriginalName();
        $validateData['image_berita'] = $imageName;
        try{
        $result = Berita::create($validateData);
        //$imageName = $request->image_berita->getClientOriginalName();
        //$request->image_berita->storeAs('public', $imageName)

        if ($result) {
            $request->image_berita->storeAs('public', $imageName);
            return redirect('/berita')->with('success', 'berhasil menambahkan data');
        } else {
            return redirect('/berita/create')->with("error", "Gagal menambahkan data!");
        }
        } catch (Exception $e){
            return redirect()->to('berita')->with("slugerror", "Gagal menambahkan data! masukkan judul yang lain!");
        };
    }
    public function destroy($id){
        Berita::where('id', $id)->delete(); 
        return redirect('/berita')->with('success', 'Berita Berhasil Dihapus!');
    }
    public function edit(Berita $berita)
    {
        $category_berita = Category_berita::all();
	    return view('edit/berita_update',['berita' => $berita, 'category_berita' => $category_berita]);
    }
}
