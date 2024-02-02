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
                // 'image_berita' => 'required|image|mimes:png,jpg,jpeg|max:2024',
                'category_berita_id' => 'required',
            ]
        );
        $validateData["user_id"] = auth()->user()->id;
        $validateData['slug'] = 'require|unique:berita';
        $validateData["slug"] = Str::slug($request->title, '-');
        $validateData["excerpt"] = Str::limit(strip_tags($request->body), 300);
        // $imageName = time() . '_' . $request->image_berita->getClientOriginalName();
        // $validateData['image_berita'] = $imageName;
        try{
        $result = Berita::create($validateData);
        if ($result) {
            // $request->image_berita->storeAs('public', $imageName);
            return redirect('/berita')->with('success', 'berhasil menambahkan data');
        } else {
            return redirect('/berita/create')->with("error", "Gagal menambahkan data!");
        }
        } catch (Exception $e){
            return redirect()->to('berita')->with("slugerror", "Gagal menambahkan data! masukkan judul yang lain!");
        };
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
            $request->file('upload')->storeAs('public/media/berita/', $imageName);
            $url = asset('storage/media/berita/' . $imageName);
            return response()->json(['fileName' => $imageName, 'uploaded' => 1, "url" => $url]);
        }
    }

    public function destroy(Berita $berita){
        $firstRow = Berita::select('body')->find($berita->id);
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
        Berita::where('id', $berita->id)->delete(); 
        return redirect('/berita')->with('success', 'Berita Berhasil Dihapus!');
    }

    public function edit(Berita $berita)
    {
        $category_berita = Category_berita::all();
	    return view('edit/berita_update',['berita' => $berita, 'category_berita' => $category_berita]);
    }

    public function update(Request $request, Berita $berita){
        $validateData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_berita_id' => 'required',
        ]);
        $validateData["slug"] = Str::slug($request->title, '-');
        $validateData["excerpt"] =  Str::limit(strip_tags($request->body), 300);
        // $imageName = time() . '_' . $request->image_artikel->getClientOriginalName();
        // $validateData['image_berita'] = $imageName;
        try{
            $result = Berita::where('id', $berita->id)
                    ->update($validateData);
            if ($result) {
                // $request->image_artikel->storeAs('public', $imageName);
                return redirect('/berita')->with('success', 'berhasil mengubah data');
            } else {
                return redirect('/berita/create')->with("error", "Gagal mengubah data!");
            }
        }catch(Exception $e){
            return redirect()->to('berita')->with("slugerror", "Gagal mengubah data! masukkan judul yang lain!");
        }
    }
}
