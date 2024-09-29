<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //施主情報をデータベースから取って、表示    
        $client = Client::first();

        if ($client !== null) {
            return view('client.index',compact('client'));
        } else {
            // エラーハンドリングや代替処理
            return redirect()->route('client.create');
        }
     
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //施主情報のフォームを表示
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //登録画面を表示
        $request->validate([
        'adult_count' =>'required|integer',
        'child_count' =>'required|integer',
        'pet' =>'required|string',
        'land_budget' =>'required|numeric',
        'building_budget' =>'required|numeric',
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
        'current_home_issues' =>'string',
        ]);

        Client::create($request->all());

        return redirect()->route('client.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //編集

        $client = Client::first();

        return view('client.edit',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //更新
        $request->validate([
            'adult_count' =>'nullable|integer',
            'child_count' =>'nullable|integer',
            'pet' =>'nullable|string',
            'land_budget' =>'nullable|numeric',
            'building_budget' =>'nullable|numeric',
            'land_area' =>'nullable|string',
            'building_area' =>'nullable|string',
            'floors' =>'nullable|string',
            'layout' =>'nullable|string',
            'regularCars' =>'nullable|string',
            'compactCars' =>'nullable|string',
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
