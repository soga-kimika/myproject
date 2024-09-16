<?php

return [
    'required' => ':attribute についての項目が記入されていません。',
    'attributes' => [
        'priority' => '「優先度」',
        'category' => ' 「カテゴリー」',
        'request_message' => '「要望記入欄」',
        'adult_count' =>'「大人の人数」',
        'child_count' =>'「子供の人数」',
        'pet' =>'「ペット」',
        'land_budget' =>'「土地の予算」',
        'building_budget' =>'「建物の予算」',
        'land_area' =>'「土地の坪数」',
        'building_area' =>'「建物の坪数」',
        'floors' =>'「階数」',
        'layout' =>'「間取り」',
        'regularCars' =>'「普通車の台数」',
        'compactCars' =>'「軽自動車の台数」',
        'motorcycles' =>'「バイクの台数」',
        'bicycles' =>'「自転車の台数」',
        'construction_area' =>'「建築エリア」',
        'date' =>'「建築希望日」',
        'current_home_issues' =>'「不満に思っていること」',
    ],
    'email' => ':attribute は有効なメールアドレスでなければなりません。',
    'min' => [
        'string' => ':attribute は少なくとも :min 文字でなければなりません。',
    ],
    // 他のエラーメッセージも必要に応じて追加してください。
];
