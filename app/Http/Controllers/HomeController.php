<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;



// マイホームノートを表示
class HomeController extends Controller
{
    public function index()
    {
        // クライアント情報を取得し、
        $userId = Auth::id();
        // そのIDの情報を取得し表示
        $client = Client::where('user_id',$userId)->first();
        // ビューを返す
        return view('home.index', compact('client'));
    }

}
