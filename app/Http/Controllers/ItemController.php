<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    // $type（bathroom-areasなど）を引数で渡して、$type（bathroom-areasなど）ごとに、ページ内容を表示
    public function show($type)
    {   
        // ページタイトルを、タイプごとに取得
        $pageTitle = $this->getPageTitleByType($type);
        // カードのタイトルとカテゴリーをタイプから取得
        $cardTitlesAndCategories = $this->getCardTitlesAndCategoriesByType($type);
        
    
        // カテゴリー１から、カード1用のアイテムを取得
        $items1 = $this->getItemsByCategory($type, $cardTitlesAndCategories[0]['category']);
        // カテゴリー２からカード2用のアイテムを取得
        $items2 = $this->getItemsByCategory($type, $cardTitlesAndCategories[1]['category']);
        
        // アイディアのページであれば、優先度のラジオボタン「不要」を表示するため、アイディアのページかチェック
        $showRemoveOption = ($type === 'requests-exclusions');
        // フォームのアクションメソッドに入るものを、タイプ別に設定
        $actionUrl = route('items.store', ['type' => $type]);
    
        return view('item.index', [
            'pageTitle' => $pageTitle,
            'title1' => $cardTitlesAndCategories[0]['title'],
            'title2' => $cardTitlesAndCategories[1]['title'],
            'items1' => $items1,
            'items2' => $items2,
            'type' => $type,
            'titles' => $cardTitlesAndCategories,
            'showRemoveOption' => $showRemoveOption,
            'actionUrl' => $actionUrl,
            
        ]);
    }
    

    // ページタイトルをタイプごとに取得
    private function getPageTitleByType($type)
    {
        $titles = [
            'bathroom-areas' => 'トイレ・バスルーム',
            'requests-exclusions' => 'アイディア・フィードバック',
            'exterior-interior-landscaping' => 'エクステリア・インテリア',
            'rooms' => 'プラベートルーム',
            'storage' => 'ストレージ・その他',
            'living-dining' => 'リビング・ダイニング',
        ];
        return $titles[$type];
    }

    // タイプから、カードタイトルとカテゴリーを取得
    private function getCardTitlesAndCategoriesByType($type)
    {
        $titles = [
            'bathroom-areas' => [
                ['id' => 1, 'title' => 'トイレ', 'category' => 'toilet'],
                ['id' => 2, 'title' => 'お風呂', 'category' => 'bath'],
            ],
            'requests-exclusions' => [
                ['id' => 1, 'title' => 'アイディア', 'category' => 'idea'],
                ['id' => 2, 'title' => 'フィードバック', 'category' => 'feedback'],
            ],
            'exterior-interior-landscaping' => [
                ['id' => 1, 'title' => '外構・外装', 'category' => 'outside'],
                ['id' => 2, 'title' => '内装', 'category' => 'interior'],
            ],
            'rooms' => [
                ['id' => 1, 'title' => '寝室', 'category' => 'bedroom'],
                ['id' => 2, 'title' => '子供部屋', 'category' => 'kidsroom'],
            ],
            'storage' => [
                ['id' => 1, 'title' => '収納', 'category' => 'storage'],
                ['id' => 2, 'title' => 'その他', 'category' => 'other'],
            ],
            'living-dining' => [
                ['id' => 1, 'title' => 'リビング', 'category' => 'living'],
                ['id' => 2, 'title' => 'ダイニング', 'category' => 'dining'],
            ],
        ];
        return $titles[$type];
    }
    

    // タイプと、カテゴリーに基づいてアイテムを取得
    private function getItemsByCategory($type, $category)
    {
        return Item::where('type', $type)
                    ->where('category', $category)
                    ->orderByRaw("FIELD(priority, 'high', 'medium', 'low', 'remove') asc")
                    ->get();
    }
    
    // フォームに入力された内容を登録
    public function store(Request $request, $type)
    {
        // バリデーション（入力のルール）
        $request->validate([
            'priority' => 'required|in:high,medium,low,remove',
            'category' => 'required|in:toilet,bath,idea,feedback,outside,interior,bedroom,kidsroom,storage,other,living,dining',
            'imageUpload' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
            'request_message' => 'required|string|max:255',
        ]);
    
        // アイテム（優先度、カテゴリー名、要望）の作成
        $item = new Item();
        $item->priority = $request->input('priority');
        $item->category = $request->input('category');
        $item->request_message = $request->input('request_message');
        
        // カードナンバーを設定
        $titlesAndCategories = $this->getCardTitlesAndCategoriesByType($type);
        foreach ($titlesAndCategories as $titleCategory) {
            if ($titleCategory['category'] === $request->input('category')) {
                $item->card_number = $titleCategory['id'];
                break;
            }
        }
    
        // 画像の保存処理
        if ($request->hasFile('imageUpload')) {
            $image = $request->file('imageUpload');
            $imagePath = $image->store('images', 'public');
            $item->image_url = $imagePath;
        }
       
        $item->type = $type;
        // 保存
        $item->save();
        return redirect()->route('items.show', ['type' => $type]);
    }
    

    // 更新
    public function update(Request $request, $type, $itemId)
    {
        $item = Item::findOrFail($itemId);

        // バリデーション
        $request->validate([
            'priority' => 'required|in:high,medium,low',
            'category' => 'required|in:toilet,bath,idea,feedback,outside,interior,bedroom,kidsroom,storage,other,living,dining',
            'imageUpload' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
            'request_message' => 'nullable|string|max:255',
        ]);

        // アイテムの更新
        $item->priority = $request->input('priority');
        $item->category = $request->input('category');
        $item->request_message = $request->input('request_message');

        // 画像の保存処理
        if ($request->hasFile('imageUpload')) {
            // 古い画像の削除
            if ($item->image_url && Storage::exists('public/' . $item->image_url)) {
                Storage::delete('public/' . $item->image_url);
            }

            $image = $request->file('imageUpload');
            $imagePath = $image->store('images', 'public');
            $item->image_url = $imagePath;
        }

        $item->save();

        return redirect()->route('items.show', ['type' => $type]);
    }

    // 削除
    public function destroy($type, $itemId)
    {
        $item = Item::findOrFail($itemId);

        // 画像の削除処理
        if ($item->image_url && Storage::exists('public/' . $item->image_url)) {
            Storage::delete('public/' . $item->image_url);
        }

        $item->delete();

        return redirect()->route('items.show', ['type' => $type])->with('success', 'アイテムが削除されました。');
    }
}
