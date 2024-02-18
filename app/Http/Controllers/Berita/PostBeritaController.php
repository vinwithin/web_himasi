<?php

namespace App\Http\Controllers\Berita;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Category_berita;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostBeritaController extends Controller
{
    public function index()
    {
        return view('admin/berita/create', [
            'category_berita' => Category_berita::all(),
            // 'transaksis' => transaksi::get()
        ]);
    }

    public function store(Request $request)
    {
        try {
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
            $image_name = time() . '_' . $request->image_berita->getClientOriginalName();
            Storage::disk('public')->put('media/berita/' . $image_name, $request->image_berita);
            $validateData['image_berita'] = $image_name;
            preg_match_all('/data:image[^>]+=/i', $validateData['body'], $matches);
            $imageTags = $matches[0];
            if (count($imageTags) > 0) {
                foreach ($imageTags as $tagImage) {
                    $image = preg_replace('/^data:image\/\w+;base64,/', '', $tagImage);
                    $extension = explode('/', explode(':', substr($tagImage, 0, strpos($tagImage, ';')))[1])[1];
                    $imageName = Str::random(10) . '.' . $extension;
                    Storage::disk('public')->put('media/berita/' . $imageName, base64_decode($image));
                    $validateData['body'] = str_replace($tagImage,  '/storage/media/berita/' . $imageName, $validateData['body']);
                }
            }

            $result = Berita::create($validateData);
            if ($result) {
                return redirect('/berita')->with('success', 'berhasil menambahkan data');
            } else {
                return redirect('/berita/buat')->with("error", "Gagal menambahkan data!");
            }
        } catch (Exception $e) {
            return redirect()->to('berita')->with("slugerror", "Gagal menambahkan data! masukkan judul yang lain!");
        };
    }

    public function destroy(Berita $berita)
    {
        $firstRow = Berita::select('body')->find($berita->id);
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
        Berita::where('id', $berita->id)->delete();
        return redirect('/berita')->with('success', 'Berita Berhasil Dihapus!');
    }

    public function edit(Berita $berita)
    {
        $category_berita = Category_berita::all();
        return view('admin/berita/edit', ['berita' => $berita, 'category_berita' => $category_berita]);
    }

    public function update(Request $request, Berita $berita)
    {
        try {
            $validateData = $request->validate([
                'title' => 'required',
                'body' => 'required',
                'image_berita' => 'required|image|mimes:png,jpg,jpeg|max:2024',
                'category_berita_id' => 'required',
            ]);
            $validateData['slug'] = 'require|unique:berita';
            $validateData["slug"] = Str::slug($request->title, '-');
            $validateData["excerpt"] =  Str::limit(strip_tags($request->body), 300);
            $image_name = time() . '_' . $request->image_berita->getClientOriginalName();
            Storage::disk('public')->put('media/berita/' . $image_name, $request->image_berita);
            $validateData['image_berita'] = $image_name;
            preg_match_all('/data:image[^>]+=/i', $validateData['body'], $matches);
            $imageTags = $matches[0];
            if (count($imageTags) > 0) {
                foreach ($imageTags as $tagImage) {
                    $image = preg_replace('/^data:image\/\w+;base64,/', '', $tagImage);
                    $extension = explode('/', explode(':', substr($tagImage, 0, strpos($tagImage, ';')))[1])[1];
                    $imageName = Str::random(10) . '.' . $extension;
                    Storage::disk('public')->put('media/berita/' . $imageName, base64_decode($image));
                    $validateData['body'] = str_replace($tagImage,  '/storage/media/berita/' . $imageName, $validateData['body']);
                }
            }

            $result = Berita::where('id', $berita->id)
                ->update($validateData);
            if ($result) {
                return redirect('/berita')->with('success', 'berhasil mengubah data');
            } else {
                return redirect('/berita/sunting')->with("error", "Gagal mengubah data!");
            }
        } catch (Exception $e) {
            return redirect()->to('berita')->with("slugerror", "Gagal mengubah data! masukkan judul yang lain!");
        }
    }
}
