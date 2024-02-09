<?php

namespace App\Http\Controllers\Artikel;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Category_artikel;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostArtikelController extends Controller
{
    public function index(Request $request)
    {
        return view("admin/artikel/create", [
            'category_artikel' => Category_artikel::all(),
        ]);
    }



    public function store(Request $request)
    {
        $imageTags = [];
        $validateData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            // 'image_artikel' => 'required|image|mimes:png,jpg,jpeg|max:2024',
            'category_artikel_id' => 'required',
        ]);

        $validateData["user_id"] = auth()->user()->id;
        $validateData["slug"] = Str::slug($request->title, '-');
        $validateData["excerpt"] =  Str::limit(strip_tags($request->body), 300);
        preg_match_all('/data:image[^>]+=/i', $validateData['body'], $matches);
        $imageTags = $matches[0];
        if (count($imageTags) > 0) {
            foreach ($imageTags as $tagImage) {
                $image = preg_replace('/^data:image\/\w+;base64,/', '', $tagImage);
                $extension = explode('/', explode(':', substr($tagImage, 0, strpos($tagImage, ';')))[1])[1];
                $imageName = Str::random(10) . '.' . $extension;
                Storage::disk('public')->put('media/artikel/' . $imageName, base64_decode($image));
                $validateData['body'] = str_replace($tagImage,  '/storage/media/artikel/' . $imageName, $validateData['body']);
            }
        }
        try {

            $result = Artikel::create($validateData);
            if ($result) {
                // $request->image_artikel->storeAs('public', $imageName);
                return redirect('/artikel')->with('success', 'Berhasil menambahkan data');
            } else {
                return redirect('/artikel/buat')->with("error", "Gagal menambahkan data!");
            }
        } catch (Exception $e) {
            return redirect()->to('artikel')->with("slugerror", "Gagal menambahkan data! masukkan judul yang lain!");
        }
    }


    public function destroy(Artikel $artikel)
    {
        $firstRow = Artikel::select('body')->find($artikel->id);
        $imageTags = [];
        if ($firstRow) {
            // Use regular expression to extract img tags
            preg_match_all('/storage[^>]+(png|jpg|jpeg)/i', $firstRow->body, $matches);

            // Add extracted img tags to the array
            $imageTags = $matches[0];
            if (count($imageTags) > 0) {
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
        return view('admin/artikel/edit', ['artikel' => $artikel, 'category_artikel' => $category_artikel]);
    }

    public function update(Request $request, Artikel $artikel)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_artikel_id' => 'required',
        ]);
        $validateData["slug"] = Str::slug($request->title, '-');
        $validateData["excerpt"] =  Str::limit(strip_tags($request->body), 300);
        preg_match_all('/data:image[^>]+=/i', $validateData['body'], $matches);
        $imageTags = $matches[0];
        if (count($imageTags) > 0) {
            foreach ($imageTags as $tagImage) {
                $image = preg_replace('/^data:image\/\w+;base64,/', '', $tagImage);
                $extension = explode('/', explode(':', substr($tagImage, 0, strpos($tagImage, ';')))[1])[1];
                $imageName = Str::random(10) . '.' . $extension;
                Storage::disk('public')->put('media/artikel/' . $imageName, base64_decode($image));
                $validateData['body'] = str_replace($tagImage,  '/storage/media/artikel/' . $imageName, $validateData['body']);
            }
        }
        try {
            $result = Artikel::where('id', $artikel->id)
                ->update($validateData);
            if ($result) {
                return redirect('/artikel')->with('success', 'Berhasil mengubah data');
            } else {
                return redirect('/artikel/sunting')->with("error", "Gagal mengubah data!");
            }
        } catch (Exception $e) {
            return redirect()->to('artikel')->with("slugerror", "Gagal mengubah data! masukkan judul yang lain!");
        }
    }
}
