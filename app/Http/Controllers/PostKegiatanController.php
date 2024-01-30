<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Kegiatan;
use Exception;

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
        try{
            $result = Kegiatan::create($validateData);
            if ($result) {
                $request->image_kegiatan->storeAs('public', $imageName);
                return redirect('/kegiatan')->with('success', 'berhasil menambahkan data');
            } else {
                return redirect('/kegiatan/create')->with("error", "Gagal menambahkan data!");
            }
        }catch(Exception $e){
            return redirect()->to('kegiatan')->with("slugerror", "Gagal menambahkan data! masukkan judul yang lain!");
        };
    }
    public function destroy(Kegiatan $kegiatan){
        Kegiatan::where('id', $kegiatan->id)->delete(); 
        return redirect('/kegiatan')->with('success', 'Kegiatan Berhasil Dihapus!');
    }
    public function edit(Kegiatan $kegiatan)
    {
	    return view('edit/kegiatan_update',['kegiatan' => $kegiatan]);
    }

    public function update(Request $request, Kegiatan $kegiatan){
        $validateData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image_kegiatan' => 'required|image|mimes:png,jpg,jpeg|max:2024',
        ]);
        $validateData["slug"] = Str::slug($request->title, '-');
        $validateData["excerpt"] =  Str::limit(strip_tags($request->body), 300);
        $imageName = time() . '_' . $request->image_artikel->getClientOriginalName();
        $validateData['image_kegiatan'] = $imageName;

        $result = Kegiatan::where('id', $kegiatan->id)
                  ->update($validateData);
        if ($result) {
            $request->image_artikel->storeAs('public', $imageName);
            return redirect('/kegiatan')->with('success', 'berhasil mengubah data');
        } else {
            return redirect('/kegiatan/create')->with("error", "Gagal mengubah data!");
        }
    }
}
