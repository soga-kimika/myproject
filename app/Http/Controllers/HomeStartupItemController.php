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
        // カテゴリーからアイテムを取得それぞれに格納
        $homeStartupItems1 = $this->getItemsByCategory($cardTitlesAndCategories[0]['category']);
        $homeStartupItems2 = $this->getItemsByCategory($cardTitlesAndCategories[1]['category']);
        $homeStartupItems3 = $this->getItemsByCategory($cardTitlesAndCategories[2]['category']);
        // ビューを返す
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
        // 優先度の高い順に表示
            ->orderByRaw("FIELD(priority, 'high', 'medium', 'low', 'remove') asc")
            ->get();
            // homeStartupItemsに格納
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
        'quantity' => 'nullable|integer|min:1',
        'imageUpload' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
       
    ]);
    // 登録
    $homeStartupItem = new HomeStartupItem();
    // 優先度
    $homeStartupItem->priority = $request->input('priority');
    // カテゴリー
    $homeStartupItem->category = $request->input('category');
    // 品名
    $homeStartupItem->item_name = $request->input('item_name');
    // メーカー・型番
    $homeStartupItem->manufacturer = $request->input('manufacturer');
    // 単価
    $homeStartupItem->price = $request->input('price');
    // 個数
    $homeStartupItem->quantity = $request->input('quantity');
    // 合計
    $homeStartupItem->amount = $homeStartupItem->price * $homeStartupItem->quantity; 

    // カードIDの設定
    $titlesAndCategories = $this->cardTitlesAndCategories();
    // 繰り返し
    foreach ($titlesAndCategories as $titlesAndCategory) {
        // 入力したカテゴリーと、タイトルから取得したカテゴリーが同じ場合、カードナンバーを返す
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
        $homeStartupItem->image_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '_' . date('Ymd_His') . '.' . $image->getClientOriginalExtension();

    }

    // 保存
    $homeStartupItem->save();
    // ビューを返す
    return redirect()->route('homeStartupItems.index');
}


        // 編集
    public function update(Request $request, $homeStartupItemId)
    {
        $homeStartupItem = HomeStartupItem::findOrFail($homeStartupItemId);
    // バリデーションルール
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
        // 既存の画像があるか確認し、あれば削除
        if ($request->hasFile('imageUpload')) {
            if ($homeStartupItem->image_url && Storage::exists('public/' . $homeStartupItem->image_url)) {
                Storage::delete('public/' . $homeStartupItem->image_url);
            }
            // 画像の登録
            $image = $request->file('imageUpload');
            $imagePath = $image->store('images', 'public');
            $homeStartupItem->image_url = $imagePath;
    
            // ユニークなファイル名の生成
            $fileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '_' . date('Ymd_His') . '.' . $image->getClientOriginalExtension();
            $homeStartupItem->image_name = $fileName;
        }
        // fill()でプロパティを一括更新
        $homeStartupItem->fill($request->only(['category', 'item_name', 'price', 'quantity', 'amount','manufacturer']));
        // amountの再計算
        $homeStartupItem->amount = $homeStartupItem->price * $homeStartupItem->quantity;
        // 保存
        $homeStartupItem->save();
        //ビューを返す
        return redirect()->route('homeStartupItems.index');
    }
    
    // 削除 
    public function destroy($homeStartupItemId)
    {
        // IDをもとに画像を探す
        $homeStartupItem = HomeStartupItem::findOrFail($homeStartupItemId);

        // 既存の画像があるか確認し、既存の画像があれば、パブリックフォルダの画像URLを削除
        if ($homeStartupItem->image_url && Storage::exists('public/' . $homeStartupItem->image_url)) {
            Storage::delete('public/' . $homeStartupItem->image_url);
        }
        // 画像削除
        $homeStartupItem->delete();
        // ビューを返す
        return redirect()->route('homeStartupItems.index');
    }
        // 画像のみ削除
    public function deleteImage($homeStartupItemId)
    {
        // IDをもとに、画像を取得
        $homeStartupItem = HomeStartupItem::findOrFail($homeStartupItemId);
        // 既存の画像があるか確認し、既存の画像があれば、パブリックフォルダの画像URLを削除
        if ($homeStartupItem->image_url && Storage::exists('public/' . $homeStartupItem->image_url)) {
            Storage::delete('public/' . $homeStartupItem->image_url);
            // 画像のURL、画像の名前をリセット
            $homeStartupItem->image_url = null;
            $homeStartupItem->image_name = null;
            // 保存
            $homeStartupItem->save();
        }
        // ビューを返す
        return redirect()->route('homeStartupItems.index');
    }


    // 編集画面表示
public function edit($homeStartupItemId)
{
    // IDからアイテム取得
    $homeStartupItem = HomeStartupItem::findOrFail($homeStartupItemId);
    // ビューを返す
    return view('partials.home_startup.edit_modal', [
        'homeStartupItem' => $homeStartupItem,
    ]);
}

}
