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
        return view('gallery.index');
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
        // ファイル名を取得し、ファイル名を重複しないように、日付をファイル名に入れてファイル名を保存
        $fileName =   $image->getClientOriginalName() . '_' . time();
        $gallery->image_name = $fileName;

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
