<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;


//画面表示
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *  
     */
    public function index()
    {
        // 全てのギャラリーの情報を取得
        $galleries = Gallery::all();
        // ビューを返す
        return view('gallery.index', compact('galleries'));
    }
    /**
     * Store a newly created resource in storage.
     * 写真の登録
     */
    public function store(Request $request)
    {
        //バリデーションルール
        $request->validate([
            'imageUpload' => 'required|image|mimes:jpeg,png,jpg|max:4096',
        ]);

        // 画像を登録
        $gallery = new Gallery();
        //imageUploadファイルに登録したものをimageに格納
        $image = $request->file('imageUpload');
        // イメージパスを作成
        $imagePath = $image->store('image', 'public');
        // 画像urlをイメージパスに格納
        $gallery->image_url = $imagePath;
        // ファイル名を取得し、ファイル名を重複しないように、日付をファイル名に入れてファイル名を保存
        $fileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '_' . date('Ymd_His') . '.' . $image->getClientOriginalExtension();
        // ファイルネームをイメージネームに格納
        $gallery->image_name = $fileName;
        // 保存
        $gallery->save();
        // ビューを返す
        return redirect()->route('galleries.index');
    }

    /**
     * Remove the specified resource from storage.
     *  //写真の削除
     */
    public function destroy($galleryId)
    {
        // IDから、画像を取得
        $gallery = Gallery::findOrFail($galleryId);
        // パブリックフォルダのイメージURLを削除
        Storage::disk('public')->delete($gallery->image_url);
        // 削除
        $gallery->delete();
        // ビューを返す
        return redirect()->route('galleries.index');
    }
}
