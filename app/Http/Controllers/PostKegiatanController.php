<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Kegiatan;

class PostKegiatanController extends Controller
{
    public function index()
    {
        return view('admin/post_kegiatan');
    }
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image_kegiatan' => 'required|image|mimes:png,jpg,jpeg|max:2024',
        ]);
        $validateData["user_id"] = auth()->user()->id;
        $validateData["slug"] = Str::slug($request->title, '-');
        $validateData["excerpt"] =  Str::limit(strip_tags($request->body), 300);
        $imageName = time() . '_' . $request->image_kegiatan->getClientOriginalName();
        $validateData['image_kegiatan'] = $imageName;
        $result = Kegiatan::create($validateData);
        //$imageName = $request->image_berita->getClientOriginalName();
        //$request->image_berita->storeAs('public', $imageName)

        if ($result) {
            $request->image_kegiatan->storeAs('public', $imageName);
            return redirect('/kegiatan')->with('success', 'berhasil menambahkan data');
        } else {
            return redirect('/kegiatan/create')->with("error", "Gagal menambahkan data!");
        }
    }
    public function destroy($id){
        Kegiatan::where('id', $id)->delete(); 
        return redirect('/kegiatan')->with('success', 'Kegiatan Berhasil Dihapus!');
    }
    public function edit(string $id)
    {
        $kegiatan= Kegiatan::where('id',$id)->get();
	    return view('edit/kegiatan_update',['kegiatan' => $kegiatan]);
    }
}
