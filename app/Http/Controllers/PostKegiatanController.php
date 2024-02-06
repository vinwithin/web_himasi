<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Kegiatan;
use Exception;
use Illuminate\Support\Facades\Storage;

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
            
        ]);
        $validateData["user_id"] = auth()->user()->id;
        $validateData['slug'] = 'require|unique:kegiatan';
        $validateData["slug"] = Str::slug($request->title, '-');
        $validateData["excerpt"] =  Str::limit(strip_tags($request->body), 300);
        preg_match_all('/data:image[^>]+=/i', $validateData['body'], $matches);
        $imageTags = $matches[0];
        if (count($imageTags) > 0) {
            foreach ($imageTags as $tagImage) {
                $image = preg_replace('/^data:image\/\w+;base64,/', '', $tagImage);
                $extension = explode('/', explode(':', substr($tagImage, 0, strpos($tagImage, ';')))[1])[1];
                $imageName = Str::random(10) . '.' . $extension;
                Storage::disk('public')->put('media/kegiatan/' . $imageName, base64_decode($image));
                $validateData['body'] = str_replace($tagImage,  '/storage/media/kegiatan/' . $imageName, $validateData['body']);
            }
        }
        try{
            $result = Kegiatan::create($validateData);
            if ($result) {
                // $request->image_kegiatan->storeAs('public', $imageName);
                return redirect('/kegiatan')->with('success', 'Berhasil menambahkan data');
            } else {
                return redirect('/kegiatan/create')->with("error", "Gagal menambahkan data!");
            }
        }catch(Exception $e){
            return redirect()->to('kegiatan')->with("slugerror", "Gagal menambahkan data! masukkan judul yang lain!");
        };
    }

    public function destroy(Kegiatan $kegiatan){
        $firstRow = Kegiatan::select('body')->find($kegiatan->id);
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
        Kegiatan::where('id', $kegiatan->id)->delete(); 
        return redirect('/kegiatan')->with('success', 'Kegiatan Berhasil Dihapus!');
    }

    public function edit(Kegiatan $kegiatan)
    {
	    return view('admin/edit/kegiatan_update',['kegiatan' => $kegiatan]);
    }

    public function update(Request $request, Kegiatan $kegiatan){
        $validateData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            // 'image_kegiatan' => 'required|image|mimes:png,jpg,jpeg|max:2024',
        ]);
        $validateData['slug'] = 'require|unique:kegiatan';
        $validateData["slug"] = Str::slug($request->title, '-');
        $validateData["excerpt"] =  Str::limit(strip_tags($request->body), 300);
        preg_match_all('/data:image[^>]+=/i', $validateData['body'], $matches);
        $imageTags = $matches[0];
        if (count($imageTags) > 0) {
            foreach ($imageTags as $tagImage) {
                $image = preg_replace('/^data:image\/\w+;base64,/', '', $tagImage);
                $extension = explode('/', explode(':', substr($tagImage, 0, strpos($tagImage, ';')))[1])[1];
                $imageName = Str::random(10) . '.' . $extension;
                Storage::disk('public')->put('media/kegiatan/' . $imageName, base64_decode($image));
                $validateData['body'] = str_replace($tagImage,  '/storage/media/kegiatan/' . $imageName, $validateData['body']);
            }
        }
        try{
            $result = Kegiatan::where('id', $kegiatan->id)
                    ->update($validateData);
            if ($result) {
                // $request->image_artikel->storeAs('public', $imageName);
                return redirect('/kegiatan')->with('success', 'Berhasil mengubah data');
            } else {
                return redirect('/kegiatan/create')->with("error", "Gagal mengubah data!");
            }
        }catch(Exception $e){
            return redirect()->to('kegiatan')->with("slugerror", "Gagal mengubah data! masukkan judul yang lain!");
        }
    }

    
}
