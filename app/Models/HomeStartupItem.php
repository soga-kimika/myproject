<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeStartupItem extends Model 
{
    protected $fillable = [
        'user_id',
        'priority',
        'category',
        'item_name',
        'price',
        'quantity',
        'amount',
        'image_name',
        'image_url',
        'manufacturer',
    ];

    public function user()
    {
        // Userモデルとのリレーションを定義
        return $this->belongsTo(User::class); 
    }
}
