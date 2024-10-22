<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;



//プロフィール情報をデータベースから取って表示    
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ログインしているユーザーのIDを探して、そのIDの一番最初のレコードを取得
        $userId = Auth::id();
        $client = Client::with('user')->where('user_id', $userId)->first();
        // レコードがあったら、プロフィール情報を表示
        if ($client !== null) {
            return view('client.index', compact('client'));
        } else {
            // レコードかった場合、登録画面に遷移
            return redirect()->route('clients.create');
        }


        //プロフィールページの表示
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // ビューを返す
        return view('client.create');
    }


    // クライアント情報を登録
    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'adult_count' => 'required|integer',
            'child_count' => 'required|integer',
            'pet' => 'required|string',
            'land_budget_exists' => 'required|string',
            'land_budget' => $request->land_budget_exists === 'no' ? 'required|string' : 'nullable|string',
            'building_budget' => 'required|string',
            'land_area' => 'required|string',
            'building_area' => 'required|string',
            'floors' => 'required|string',
            'layout' => 'required|string',
            'regularCars' => 'required|string',
            'compactCars' => 'required|string',
            'motorcycles' => 'required|string',
            'bicycles' => 'required|string',
            'construction_area' => 'nullable|string',
            'date' => 'nullable|date',
            'current_home_issues' => 'nullable|string',
        ]);

        // データの保存
        $client = $request->all();

        // 土地の所有が「あり」の場合は、land_budgetに「-」を設定
        if ($client['land_budget_exists'] === 'yes') {
            $client['land_budget'] = '-';
        }
        // 登録
        $client['user_id'] = Auth::id();

        Client::create($client);
        // 保存
        return redirect()->route('clients.index');
    }


    // 編集ページ表示
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //ログインしているユーザーのIDを探して、そのIDの一番最初のレコードを取得
        $userId = Auth::id();
        $client = Client::where('user_id', $userId)->first();

        // ビューを返す
        return view('client.edit', compact('client'));
    }
    // 更新
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // バリデーション
        $request->validate([
            'adult_count' => 'nullable|integer',
            'child_count' => 'nullable|integer',
            'pet' => 'nullable|string',
            'land_budget_exists' => 'nullable|string',
            'land_budget' => $request->land_budget_exists === 'no' ? 'required|string' : 'nullable|string',
            'building_budget' => 'nullable|string',
            'land_area' => 'nullable|string',
            'building_area' => 'nullable|string',
            'floors' => 'nullable|string',
            'layout' => 'nullable|string',
            'regularCars' => 'nullable|string',
            'miniCars' => 'nullable|string',
            'motorcycles' => 'nullable|string',
            'bicycles' => 'nullable|string',
            'construction_area' => 'nullable|string',
            'date' => 'nullable|date',
            'current_home_issues' => 'nullable|string',
        ]);
    
        // ログインしているユーザーのIDを探して、そのIDの一番最初のレコードを取得
        $userId = Auth::id();
        $client = Client::where('user_id', $userId)->first();
    
        // データの準備
        $data = $request->all();
    
        // 土地の所有状態に基づく予算の設定
        if ($data['land_budget_exists'] === 'yes') {
            // 所有地ありの場合、元のland_budgetをクリアして「-」を設定
            $data['land_budget'] = '-';
        } elseif ($data['land_budget_exists'] === 'no') {
            // 所有地なしの場合は、land_budgetを必須とする
            if (empty($data['land_budget'])) {
                return redirect()->back();
            }
        }
    
        // 更新
        $client->update($data);
    
        // ビューを返す
        return redirect()->route('clients.index');
    }
    
}
