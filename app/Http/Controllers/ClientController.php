<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Client;


 //プロフィール情報をデータベースから取って表示    
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 一番最初のレコードを取得
        $client = Client::first();
        // レコードがあったら、プロフィール情報を表示
        if ($client !== null) {
            return view('client.index',compact('client'));
        } else {
        // レコードかった場合、登録画面に遷移
            return redirect()->route('client.create');
        }
     
      
     //プロフィールページを表示
    } /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
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
        'adult_count' =>'required|integer',
        'child_count' =>'required|integer',
        'pet' =>'required|string',
        'land_budget_exists' => 'required|string',
        'building_budget' =>'required|string',
        'land_area' =>'required|string',
        'building_area' =>'required|string',
        'floors' =>'required|string',
        'layout' =>'required|string',
        'regularCars' =>'required|string',
        'compactCars' =>'required|string',
        'motorcycles' =>'required|string',
        'bicycles' =>'required|string',
        'construction_area' =>'required|string',
        'date' =>'required|date',
        'current_home_issues' =>'nullable|string',
    ]);

    // 土地の所有が「なし：no」の場合は、土地予算項目欄を必須とする
    if ($request->land_budget_exists === 'no') {
        $request['land_budget'] = 'required|string';
    } else {
        // 土地の所有が「ある：ｙｅｓ」の場合は、土地の予算項目は入力不要とする
        $request['land_budget'] = 'nullable|string'; 
    }

    // データの保存
    $clients = $request->all();

    // 土地の所有が「あり」の場合は、land_budgetに「-」を設定
    if ($clients['land_budget_exists'] === 'yes') {
        $clients['land_budget'] = '-';
    }

    Client::create($clients);

    return redirect()->route('client.index');
}

    
    // 編集
    /**
         * Show the form for editing the specified resource.
         */
        public function edit()
        {
            //一番最初のレコードを取得
            $client = Client::first();
            return view('client.edit',compact('client'));
        }

    // 更新
        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request)
        {
            //バリデーション
            $request->validate([
                'adult_count' =>'nullable|integer',
                'child_count' =>'nullable|integer',
                'pet' =>'nullable|string',
                'land_budget_exists' =>'nullable|numeric',
                'building_budget' =>'nullable|numeric',
                'land_area' =>'nullable|string',
                'building_area' =>'nullable|string',
                'floors' =>'nullable|string',
                'layout' =>'nullable|string',
                'regularCars' =>'nullable|string',
                'miniCars' =>'nullable|string',
                'motorcycles' =>'nullable|string',
                'bicycles' =>'nullable|string',
                'construction_area' =>'nullable|string',
                'date' =>'nullable|date',
                'current_home_issues' =>'nullable|string',
            ]);

                $client = Client::first();

                $client->update($request->all());

                return redirect()->route('client.index');

    
        }
    
    }
