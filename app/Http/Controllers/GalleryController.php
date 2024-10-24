<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;


//画面表示
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *  
     */
    public function index()
    {
        // ログインしているユーザーのIDを取得
        $userId = Auth::id();
        // ログインユーザーのギャラリー情報を取得
        $galleries = Gallery::where('user_id',$userId)->get();
        // ビューを返す
        return view('gallery.index', compact('galleries'));
    }
    /**
     * Store a newly created resource in storage.
     * 写真の登録
     */
    public function store(Request $request)
    {
        // バリデーションルール
        $request->validate([
            'imageUpload' => 'required|image|mimes:jpeg,png,jpg|max:4096',
        ]);
    
        // 画像を登録
        $gallery = new Gallery();
        // ログインしているユーザーのIDからそのユーザーのIDの画像のみ取得
        $gallery->user_id = Auth::id();
    
        // 画像の取得とエンコード
        $image = file_get_contents($request->file('imageUpload')->getRealPath());
        $binary_image = base64_encode($image);
        
        // base64 エンコードされた画像データを保存
        $gallery->image_url = 'data:image/jpeg;base64,' . $binary_image; // 
        $gallery->image_name = $request->file('imageUpload')->getClientOriginalName(); 
    
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


    // 管理者用ページでのギャラリー一覧表示
    public function indexGalleries(Request $request)
    {
        // ギャラリーのクエリを準備
        $query = Gallery::with('user');
    
        // 検索条件がある場合
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                // ユーザーIDは完全一致
                $q->where('user_id', $search)
                  ->orWhereHas('user', function($q) use ($search) {
                      $q->where('name', 'LIKE', "%{$search}%");
                  });
            });
        }
    
        // ギャラリーを取得し、ページネーション
        $galleries = $query->paginate(10);
    
        // 管理者用のビューを返す
        return view('admin.galleries', compact('galleries'));
    }
     // ギャラリー一覧削除
     public function destroyGallery($id)
     {
         Gallery::destroy($id);
         return redirect()->route('admin.galleries.index');
     }

}
