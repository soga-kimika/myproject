<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeStartupItem;
use Illuminate\Support\Facades\Storage;

class HomeStartupItemController extends Controller
{
    public function index()
    {
        // カテゴリー１から、カード1用のアイテムを取得
        $homeStartupItem1 = $this->getItemsByCategory($cardTitlesAndCategories[0]['category']);
        // カテゴリー２からカード2用のアイテムを取得
        $homeStartupItem2 = $this->getItemsByCategory($cardTitlesAndCategories[1]['category']);
        // カテゴリー３からカード３用のアイテムを取得
        $homeStartupItem3 = $this->getItemsByCategory($cardTitlesAndCategories[2]['category']);


        return view('HomeStartupItem.index', [
            'homeStartupItem1' => $homeStartupItem1,
            'homeStartupItem2' => $homeStartupItem2,
            'homeStartupItem3' => $homeStartupItem3,
        ]);
    }

    // カテゴリーを取得
    private function getItemsByCategory($category)
    {
        return HomeStartupItem::where('category', $category)
            ->orderByRaw("FIELD(priority, 'high', 'medium', 'low', 'remove') asc")
            ->get();
    }

    // 登録
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'priority' => 'required|in:high,medium,low,remove',
            'category' => 'required|in:furniture,appliances,accessories',
            'request_message' => 'required|string|max:255',
            'price' => 'nullable|int',
            'quantity' => 'nullable|string',
            'amount' => 'nullable|int',
            'imageUpload' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
        ]);

        $homeStartupItem = new HomeStartupItem();
        $homeStartupItem->fill($request->only(['priority', 'category', 'request_message']));

        // 画像の保存処理
        if ($request->hasFile('imageUpload')) {
            $image = $request->file('imageUpload');
            $homeStartupItem->image_url = $image->store('images', 'public');
            $homeStartupItem->image_name = $image->getClientOriginalName() . '_' . time();
        }

        $homeStartupItem->save();

        return redirect()->route('homeStartupItems.index');
    }

    public function update(Request $request,  $homeStartupItemId)
    {
        $homeStartupItem = HomeStartupItem::findOrFail($homeStartupItemId);

        // バリデーション
        $request->validate([
            'priority' => 'required|in:high,medium,low,remove',
            'category' => 'required|in:furniture,appliances,accessories',
            'request_message' => 'required|string|max:255',
            'price' => 'nullable|int',
            'quantity' => 'nullable|string',
            'amount' => 'nullable|int',
            'imageUpload' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
        ]);

        // 画像処理
        if ($request->hasFile('imageUpload')) {
            if ($homeStartupItem->image_url && Storage::exists('public/' . $homeStartupItem->image_url)) {
                Storage::delete('public/' . $homeStartupItem->image_url);
            }

            $image = $request->file('imageUpload');
            $homeStartupItem->image_url = $image->store('images', 'public');
            $homeStartupItem->image_name = $image->getClientOriginalName() . '_' . time();
        }

        $homeStartupItem->save();

        return redirect()->route('homeStartupItems.index');
    }

    public function destroy($homeStartupItem)
    {
        $homeStartupItem = HomeStartupItem::findOrFail($homeStartupItem);

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
            $homeStartupItem->image_url = null;
            $homeStartupItem->image_name = null;
            $homeStartupItem->save();
        }

        return redirect()->route('homeStartupItems.index');
    }
}
