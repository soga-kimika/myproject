<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeStartupItem; 
use Illuminate\Support\Facades\Storage;

// 画面表示
class HomeStartupItemController extends Controller
{
    public function index()
    {
        // タイトルから、カテゴリーを取得
        $cardTitlesAndCategories = $this->cardTitlesAndCategories();
        // カテゴリーからアイテムを取得したものを格納
        $homeStartupItems1 = $this->getItemsByCategory($cardTitlesAndCategories[0]['category']);
        $homeStartupItems2 = $this->getItemsByCategory($cardTitlesAndCategories[1]['category']);
        $homeStartupItems3 = $this->getItemsByCategory($cardTitlesAndCategories[2]['category']);

        return view('HomeStartupItem.index', [
            'homeStartupItems1' => $homeStartupItems1,
            'homeStartupItems2' => $homeStartupItems2,
            'homeStartupItems3' => $homeStartupItems3,
        ]);
    }
    // タイトルからカテゴリーとIDを取得
    private function cardTitlesAndCategories() {
        return [
            ['title' => 'ファニチャー', 'category' => 'furniture', 'card_id' => '1'],
            ['title' => 'アプライアンス', 'category' => 'appliance', 'card_id' => '2'],
            ['title' => 'アクセサリーズ', 'category' => 'accessories', 'card_id' => '3'],
        ];
    }   

// カテゴリーをもとに、アイテム（データ）を取得
    private function getItemsByCategory($category)
    {   
        $homeStartupItems = HomeStartupItem::where('category', $category)
            ->orderByRaw("FIELD(priority, 'high', 'medium', 'low', 'remove') asc")
            ->get();
            return $homeStartupItems;
    }
// 登録
public function store(Request $request)
{
    // バリデーションルール
    $request->validate([
        'priority' => 'required|in:high,medium,low,remove',
        'category' => 'nullable|in:furniture,appliance,accessories',
        'item_name' => 'required|string|max:255',
        'manufacturer' => 'nullable|string|max:255',
        'price' => 'nullable|integer|min:1000',
        'quantity' => 'required|integer|min:1',
        'imageUpload' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
       
    ]);

    $homeStartupItem = new HomeStartupItem();
    $homeStartupItem->priority = $request->input('priority');
    $homeStartupItem->category = $request->input('category');
    $homeStartupItem->item_name = $request->input('item_name');
    $homeStartupItem->manufacturer = $request->input('manufacturer');
    $homeStartupItem->price = $request->input('price');
    $homeStartupItem->quantity = $request->input('quantity');
    $homeStartupItem->amount = $homeStartupItem->price * $homeStartupItem->quantity; 

    // カードIDの設定
    $titlesAndCategories = $this->cardTitlesAndCategories();
    foreach ($titlesAndCategories as $titlesAndCategory) {
        if ($titlesAndCategory['category'] === $request->input('category')) {
            $homeStartupItem->card_number = $titlesAndCategory['card_id'];
            break;
        }
    }

    // 画像の保存
    if ($request->hasFile('imageUpload')) {
        $image = $request->file('imageUpload');
        $imagePath = $image->store('images', 'public');
        $homeStartupItem->image_url = $imagePath;
        $homeStartupItem->image_name = time() . '_' . $image->getClientOriginalName();  
    }

    // 保存
    $homeStartupItem->save();
    return redirect()->route('homeStartupItems.index');
}


        // 編集
    public function update(Request $request, $homeStartupItemId)
    {
        $homeStartupItem = HomeStartupItem::findOrFail($homeStartupItemId);
    
        $request->validate([
            'priority' => 'nullable|in:high,medium,low,remove',
            'category' => 'nullable|in:furniture,appliance,accessories',
            'item_name' => 'nullable|string|max:255',
            'manufacturer' => 'nullable|string|max:255',
            'price' => 'nullable|integer',
            'quantity' => 'nullable|integer',
            'amount' => 'nullable|numeric',
            'imageUpload' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
        ]);
           // 優先度の更新
        if ($request->has('priority')) {
            $homeStartupItem->priority = $request->input('priority');
        }
    
        if ($request->hasFile('imageUpload')) {
            if ($homeStartupItem->image_url && Storage::exists('public/' . $homeStartupItem->image_url)) {
                Storage::delete('public/' . $homeStartupItem->image_url);
            }
    
            $image = $request->file('imageUpload');
            $imagePath = $image->store('images', 'public');
            $homeStartupItem->image_url = $imagePath;
    
            // ユニークなファイル名の生成
            $fileName =     HomeStartupItem::random(10) . '_' . $image->getClientOriginalName();
            $homeStartupItem->image_name = $fileName;
        }
    
        // fill()でプロパティを一括更新
        $homeStartupItem->fill($request->only(['category', 'item_name', 'price', 'quantity', 'amount','manufacturer']));

        // 保存
        $homeStartupItem->save();
    
        return redirect()->route('homeStartupItems.index');
    }
    
    // 削除 
    public function destroy($homeStartupItemId)
    {
        $homeStartupItem = HomeStartupItem::findOrFail($homeStartupItemId);

        // 画像の削除処理
        if ($homeStartupItem->image_url && Storage::exists('public/' . $homeStartupItem->image_url)) {
            Storage::delete('public/' . $homeStartupItem->image_url);
        }
        $homeStartupItem->delete();

        return redirect()->route('homeStartupItems.index');
    }

        // 画像のみ削除
    public function deleteImage($homeStartupItemId)
    {
        $homeStartupItem = HomeStartupItem::findOrFail($homeStartupItemId);

        if ($homeStartupItem->image_url && Storage::exists('public/' . $homeStartupItem->image_url)) {
            Storage::delete('public/' . $homeStartupItem->image_url);
            // 画像のURLをリセット
            $homeStartupItem->image_url = null;
            $homeStartupItem->image_name = null;
            $homeStartupItem->save();
        }

        return redirect()->route('homeStartupItems.index');
    }
    // 編集画面表示
public function edit($homeStartupItemId)
{
    $homeStartupItem = HomeStartupItem::findOrFail($homeStartupItemId);

    return view('partials.home_startup.edit_modal', [
        'homeStartupItem' => $homeStartupItem,
    ]);
}

}
