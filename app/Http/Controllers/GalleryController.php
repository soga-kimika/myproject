<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *  //画面表示
     */
    public function index()
    {
        return view('galleries.index');
    }
    /**
     * Store a newly created resource in storage.
     * 写真の登録
     */
    public function store(Request $request)
    {
        //バリデーションルール
        $request->validate([
            'imageUpload' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
        ]);

        $gallery = new Gallery();
        $image = $request->file('imageUpload');
        $imagePath = $image->store('image', 'public');
        $gallery->image_url = $imagePath;

        $gallery->save();
        return redirect()->route('galleries.index');
    }

    /**
     * Remove the specified resource from storage.
     *  //写真の削除
     */
    public function destroy(request $request, $galleryId)
    {

       
        $gallery = Gallery::findOrFail($galleryId);
        Storage::disk('public')->delete($gallery->image_url);
        $gallery->delete();

        return redirect()->route('galleries.index');

    }
}


