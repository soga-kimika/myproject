<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    // $type（bathroom-areasなど）を引数で渡して、$type（bathroom-areasなど）ごとに、ページ内容を表示
    public function index($type)
    {
        // ページタイトルを、タイプごとに取得
        $pageInfo = $this->getPageTitleByType($type);
        $pageTitle = $pageInfo['title']; // タイトルを取得
        $pageIcon = $pageInfo['icon']; // アイコンを取得
        // カードのタイトルとカテゴリーをタイプから取得
        $cardTitlesAndCategories = $this->getCardTitlesAndCategoriesByType($type);
        // ナッシングを除外したカードタイトルのとき
        $cardTitlesWithoutNothing = array_filter($cardTitlesAndCategories, function ($titles) {
            return $titles['title'] !== 'ナッシング';
        });

        // カテゴリー１から、カード1用のアイテムを取得
        $items1 = $this->getItemsByCategory($type, $cardTitlesAndCategories[0]['category']);
        // カテゴリー２からカード2用のアイテムを取得
        $items2 = $this->getItemsByCategory($type, $cardTitlesAndCategories[1]['category']);

        return view('item.index', [
            'pageTitle' => $pageTitle,
            'pageIcon' => $pageIcon,
            'title1' => $cardTitlesAndCategories[0]['title'],
            'title2' => $cardTitlesAndCategories[1]['title'],
            'icon1' => $cardTitlesAndCategories[0]['icon'],
            'icon2' => $cardTitlesAndCategories[1]['icon'],
            'items1' => $items1,
            'items2' => $items2,
            'type' => $type,
            'titles' => $cardTitlesAndCategories,
            'filteredTitles' => $cardTitlesWithoutNothing,

        ]);
    }
    // ページタイトルをタイプごとに取得
    private function getPageTitleByType($type)
    {
        $titles = [
            'bathrooms' => ['title' => 'バスルーム', 'icon' => '<i class="fas fa-sink"></i>'],
            'ideas' => ['title' => 'アイディア', 'icon' => '<i class="fas fa-lightbulb"></i>'],
            'designs' => ['title' => 'デザイン', 'icon' => '<i class="fas fa-palette"></i>'],
            'rooms' => ['title' => 'プラベートルーム', 'icon' => '<i class="fas fa-bed"></i>'],
            'storages' => ['title' => 'ストレージ', 'icon' => '<i class="fas fa-box"></i>'],
            'ldk' => ['title' => 'LDK', 'icon' => '<i class="fas fa-couch"></i>'],
        ];

        return $titles[$type];
    }


    // タイプから、カードタイトルとカテゴリーを取得
    private function getCardTitlesAndCategoriesByType($type)
    {
        $titles = [
            'bathrooms' => [
                ['id' => 1, 'title' => ' トイレ', 'category' => 'toilet', 'icon' => '<i class="fas fa-toilet"></i>'],
                ['id' => 2, 'title' => 'バスルーム', 'category' => 'bath', 'icon' => '<i class="fas fa-bath"></i>'],
            ],  
            'ideas' => [
                ['id' => 1, 'title' => 'ウィッシュリスト', 'category' => 'idea', 'icon' => '<i class="fas fa-check fa-check-title"></i>'],
                ['id' => 2, 'title' => 'ナッシング', 'category' => 'nothing', 'icon' => '<i class="fas fa-trash"></i>'],
            ],
            'designs' => [
                ['id' => 1, 'title' => 'エクステリア', 'category' => 'outside', 'icon' => '<i class="fas fa-tree"></i>'],
                ['id' => 2, 'title' => 'インテリア', 'category' => 'interior', 'icon' => '<i class="fas fa-chair"></i>'],
            ],
            'rooms' => [
                ['id' => 1, 'title' => 'ベッドルーム', 'category' => 'bedroom', 'icon' => '<i class="fas fa-user-friends"></i>'],
                ['id' => 2, 'title' => 'キッズルーム', 'category' => 'kidsroom', 'icon' => '<i class="fas fa-child"></i>'],
            ],
            'storages' => [
                ['id' => 1, 'title' => 'ストレージ', 'category' => 'storage', 'icon' => '<i class="fas fa-boxes"></i>'],
                ['id' => 2, 'title' => 'カスタマイズ', 'category' => 'other', 'icon' => '<i class="fas fa-tools"></i>'],
            ],
            'ldk' => [
                ['id' => 1, 'title' => 'リビング', 'category' => 'living', 'icon' => '<i class="fas fa-tv"></i>'],
                ['id' => 2, 'title' => 'ダイニング・キッチン', 'category' => 'dining', 'icon' => '<i class="fas fa-utensils"></i>'],
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
            'category' => 'required|in:toilet,bath,idea,nothing,outside,interior,bedroom,kidsroom,storages,other,living,dining',
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
        return redirect()->route('items.index', ['type' => $type]);
    }


    // 更新
    public function update(Request $request, $type, $itemId)
    {
        $item = Item::findOrFail($itemId);

        // バリデーション
        $request->validate([
            'priority' => 'nullable|in:high,medium,low',
            'imageUpload' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
            'request_message' => 'nullable|string|max:255',
        ]);

        // アイテムの更新
        if ($request->has('priority')) {
            $item->priority = $request->input('priority');
        }
        // 要望の更新
        if ($request->has('request_message')) {
            $item->request_message = $request->input('request_message');
        }

        // 画像の処理
        if ($request->hasFile('imageUpload')) {
            // 既存の画像がある場合
            if ($item->image_url) {
                // 画像更新のリクエストがあった場合
                if ($request->hasFile('imageUpload')) {
                    // 古い画像の削除
                    if (Storage::exists('public/' . $item->image_url)) {
                        Storage::delete('public/' . $item->image_url);
                    }

                    // 新しい画像を保存
                    $image = $request->file('imageUpload');
                    $imagePath = $image->store('images', 'public');
                    $item->image_url = $imagePath;
                }
            } else {
                // 既存の画像がない場合で、画像のリクエストがあった場合
                $image = $request->file('imageUpload');
                $imagePath = $image->store('images', 'public');
                $item->image_url = $imagePath;
            }
        }

        // アイテムを保存
        $item->save();

        return redirect()->route('items.index', ['type' => $type]);
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

        return redirect()->route('items.index', ['type' => $type])->with('success', 'アイテムが削除されました。');
    }

    // 画像の削除
    public function deleteImage($type, $itemId)
    {
        $item = Item::findOrFail($itemId);
        if ($item->image_url && Storage::exists('public/' . $item->image_url)) {
            Storage::delete('public/' . $item->image_url);
            // 画像URLをリセット
            $item->image_url = null;
            $item->save();
        }

        return redirect()->route('items.index', ['type' => $type]);
    }
}
