<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Item;
use App\Models\HomeStartupItem;
use App\Models\Gallery;
use Illuminate\Http\Request;

// ホーム画面表示
class AdminController extends Controller
{                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
    public function home()
    {
        return view('admin.home');
    }

    // ユーザー一覧
    public function indexUsers()
    {
        $users = User::paginate(10);
        return view('admin.users', compact('users'));
    }
    // ユーザー削除
    public function destroyUser($id)
    {
        User::destroy($id);
        return redirect()->route('admin.users.index');
    }
    // クライアント一覧表示
    public function indexClients()
    {
        $clients = Client::paginate(10); 
        return view('admin.clients', compact('clients'));
    }
    // クライアント一覧削除
    public function destroyClient($id)
    {
        Client::destroy($id);
        return redirect()->route('admin.clients.index');
    }
    // アイテム一覧表示
    public function indexItems()
    {
        $items = Item::paginate(10);
        return view('admin.items', compact('items'));
    }
    // アイテム一覧削除
    public function destroyItem($id)
    {
        Item::destroy($id);
        return redirect()->route('admin.items.index');
    }
    // ホームスタートアップアイテム一覧表示
    public function indexHomeStartupItems()
    {
        $homeStartupItems = HomeStartupItem::paginate(10);
        return view('admin.homeStartupItems', compact('homeStartupItems'));
    }
    // ホームスタートアップアイテム一覧削除
    public function destroyHomeStartupItem($id)
    {
        HomeStartupItem::destroy($id);
        return redirect()->route('admin.homeStartupItems.index');
    }
    // ギャラリー一覧表示
    public function indexGalleries()
    {
        $galleries = Gallery::paginate(10);
        return view('admin.galleries', compact('galleries'));
    }
    // ギャラリー一覧削除
    public function destroyGallery($id)
    {
        Gallery::destroy($id);
        return redirect()->route('admin.galleries.index');
    }
}
