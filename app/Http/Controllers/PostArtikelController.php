<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Category_artikel;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
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
            // 'image_artikel' => 'required|image|mimes:png,jpg,jpeg|max:2024',
            'category_artikel_id' => 'required',
        ]);
        $validateData["user_id"] = auth()->user()->id;
        $validateData["slug"] = Str::slug($request->title, '-');
        $validateData["excerpt"] =  Str::limit(strip_tags($request->body), 300);
        // $imageName = time() . '_' . $request->image_artikel->getClientOriginalName();
        // $validateData['image_artikel'] = $imageName;
        try{
       
            $result = Artikel::create($validateData);
            if ($result) {
                // $request->image_artikel->storeAs('public', $imageName);
                return redirect('/artikel')->with('success', 'Berhasil menambahkan data');
            } else {
                return redirect('/artikel/create')->with("error", "Gagal menambahkan data!");
            }
        }catch(Exception $e){
            return redirect()->to('artikel')->with("slugerror", "Gagal menambahkan data! masukkan judul yang lain!");
        }
      
    }
    public function upload(Request $request){
        $request->validate([
            'upload' => 'required|image|mimes:png,jpg,jpeg|max:2024',
        ]);
        if($request->hasFile('upload')){
            
            $originName = $request->file('upload')->getClientOriginalName();
            $imageName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $imageName = $imageName . time() . '.' . $extension;
            // $request->file('upload')->move(public_path('media'), $imageName);
            $request->file('upload')->storeAs('public/media/artikel', $imageName);
            $url = asset('storage/media/artikel/' . $imageName);
            return response()->json(['fileName' => $imageName, 'uploaded' => 1, "url" => $url]);
        }
    }

    public function destroy(Artikel $artikel){
        $firstRow = Artikel::select('body')->find($artikel->id);
        $imageTags = [];
        if ($firstRow) {
            // Use regular expression to extract img tags
            preg_match_all('/storage[^>]+(png|jpg|jpeg)/i', $firstRow->body, $matches);

            // Add extracted img tags to the array
            $imageTags = $matches[0];
            if(count($imageTags) > 0){
                foreach ($imageTags as $tag) {

                        // Delete the file
                    unlink($tag);
                }
            }
        }
        Artikel::where('id', $artikel->id)->delete(); 
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
            'category_artikel_id' => 'required',
        ]);
        $validateData["slug"] = Str::slug($request->title, '-');
        $validateData["excerpt"] =  Str::limit(strip_tags($request->body), 300);
        try{
            $result = Artikel::where('id', $artikel->id)
                    ->update($validateData);
            if ($result) {
                return redirect('/artikel')->with('success', 'Berhasil mengubah data');
            } else {
                return redirect('/artikel/create')->with("error", "Gagal mengubah data!");
            }
        }catch(Exception $e){
            return redirect()->to('artikel')->with("slugerror", "Gagal mengubah data! masukkan judul yang lain!");
        }
    }

}
