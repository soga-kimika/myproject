<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Storage;


class ItemController extends Controller
{

    public function show($type, $isForm = false)
    {
      
        // ページタイトルを取得
        $pageTitle = $this->getPageTitleByType($type);

        // カードごとのタイトルとアイテムを取得
        $titles = $this->getTitleByType($type);
        $items1 = $this->getItemsByTitle($type, 1); // カード1用のアイテム
        $items2 = $this->getItemsByTitle($type, 2); // カード2用のアイテムム

        // アイディアページであるかどうかを判定
        $showRemoveOption = ($type === 'requests-exclusions');

        $actionUrl = $isForm ? route('items.store', ['type' => $type]) : null;

        // アクションURLの設定
        $actionUrl = route('items.store', ['type' => $type]);

        // ビューに渡すデータを整形
        return view($isForm ? 'item.form' : 'item.index', [
            'pageTitle' => $pageTitle,
            'title1' => $titles[0]['title'],
            'title2' => $titles[1]['title'],
            'items1' => $items1,
            'items2' => $items2,
            'type' => $type,
            'titles' => $titles,
            'showRemoveOption' => $showRemoveOption,
            'actionUrl' => $actionUrl,
            'cardTitleMapping' => $this->getCardTitleMapping()
        ]);
    }



    // ページタイトルを取得
    private function getPageTitleByType($type)
    {
        $titles = [
            'bathroom-areas' => 'トイレ・バスルーム',
            'requests-exclusions' => 'アイディア・フィードバック',
            'exterior-interior-landscaping' => 'エクステリア・インテリア',
            'rooms' => 'プラベートルーム',
            'storage' => 'ストレージ・その他',
            'living-dining' => 'リビング・ダイニング'
        ];

        return $titles[$type] ?? '未定義';
    }

    // カードタイトルを取得
    private function getTitleByType($type)
    {
        $titles = [
            'bathroom-areas' => [
                ['id' => 1, 'title' => 'トイレ', 'description' => 'トイレに関する情報'],
                ['id' => 2, 'title' => 'お風呂', 'description' => 'お風呂に関する情報'],
            ],
            'requests-exclusions' => [
                ['id' => 1, 'title' => 'アイディア', 'description' => 'アイディア'],
                ['id' => 2, 'title' => 'フィードバック', 'description' => 'フィードバック'],
            ],
            'exterior-interior-landscaping' => [
                ['id' => 1, 'title' => '外構・外装', 'description' => '外構・外装に関する情報'],
                ['id' => 2, 'title' => '内装', 'description' => '内装に関する情報'],
            ],
            'rooms' => [
                ['id' => 1, 'title' => '寝室', 'description' => '寝室'],
                ['id' => 2, 'title' => '子供部屋', 'description' => '子供部屋'],
            ],
            'storage' => [
                ['id' => 1, 'title' => '収納', 'description' => '収納に関する情報'],
                ['id' => 2, 'title' => 'その他', 'description' => 'その他に関する情報'],
            ],
            'living-dining' => [
                ['id' => 1, 'title' => 'リビング', 'description' => 'リビングに関する情報'],
                ['id' => 2, 'title' => 'ダイニング', 'description' => 'ダイニングに関する情報'],
            ],
        ];

        return $titles[$type] ?? [['title' => '未定義', 'description' => '未定義']];
    }


    private function getCardTitleMapping()
    {
        return [
            'トイレ' => 'toilet',
            'お風呂' => 'bath',
            'アイディア' => 'idea',
            'フィードバック' => 'feedback',
            '外構・外装' => 'outside',
            '内装' => 'interior',
            '寝室' => 'bedroom',
            '子供部屋' => 'kidsroom',
            '収納' => 'storage',
            'その他' => 'other',
            'リビング' => 'living',
            'ダイニング' => 'dining',
        ];
    }
    // タイプとカードタイトルに基づいてアイテムを取得
    private function getItemsByTitle($type, $cardTitle)
    {

        $titles = $this->getTitleByType($type);
        $cardTitleMapping = $this->getCardTitleMapping();

        // カードタイトルのマッピングを適用
        $mappedTitle = $cardTitleMapping[$cardTitle] ?? $cardTitle;

        // マッピングされたタイトルを基にIDを取得
        $filtered = array_filter($titles, function ($title) use ($mappedTitle) {
            return $title['id'] == $mappedTitle;
            // return $title['title'] === $mappedTitle;
        });

        // 一致するカードが見つからない場合は空の結果を返す
        if (empty($filtered)) {
            return collect();
        }

        // 一致するカードのIDを取得
        $cardId = reset($filtered)['id'];

        // アイテムの取得（IDを使ってフィルタリング）
        return Item::where('type', $type)
            ->where('card_number', $cardId)
            ->get();
    }




    public function showItemsByTitle($type, $cardTitle)
    {
        // タイトルを基にアイテムを取得
        $items = $this->getItemsByTitle($type, $cardTitle);

        // ビューにアイテムのリストを渡す
        return view('items.index', ['items' => $items, 'title' => $cardTitle]);
    }



    public function store(Request $request, $type)
    {
        $category_array = [
            'storage' => 1,
            'other' => 2,
            'toilet' => 1,
            'living' => 1,
            'dining' => 2,
            'kidsroom' => 2,
            'bedroom' => 1,
            'interior' => 2,
            'feedback' => 2,
            'idea' => 1,
            'bath' => 2,
            'outside' => 1,

        ];
        // バリデーション
        $request->validate([
            'priority' => 'required|in:high,medium,low,remove',
            'category' => 'required|in:toilet,bath,idea,feedback,outside,interior,bedroom,kidsroom,storage,other,living,dining',
            'imageUpload' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
            'request_message' => 'required|string|max:255',
        ]);

        // アイテムの作成
        $item = new Item();
        $item->priority = $request->input('priority');
        $item->category = $request->input('category');
        $item->request_message = $request->input('request_message');
        $item->card_number = $category_array[$request->input('category')];
        // 画像の保存処理
        if ($request->hasFile('imageUpload')) {
            $image = $request->file('imageUpload');
            $imagePath = $image->store('images', 'public');
            $item->image_url = $imagePath;
        }

        $item->type = $type;
        $item->save();

        return redirect()->route('items.show', ['type' => $type])
            ->with('success', 'アイテムが登録されました。');
    }

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
        $item->requestMessage = $request->input('request_message');

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

        return redirect()->route('items.show', ['type' => $type])->with('success', 'アイテムが更新されました。');
    }

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
