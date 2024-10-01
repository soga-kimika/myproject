<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Client;


// マイホームノートを表示
class HomeController extends Controller
{
    public function index()
    {
        // クライアント情報を取得
        $client = Client::first();
        return view('home.index', compact('client'));
    }


}
