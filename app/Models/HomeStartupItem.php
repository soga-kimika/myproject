<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class homeStartupItem extends Model
{

    protected $fillable = [
        'priority',
        'category',
        'item_name',
        'price',
        'quantity',
        'amount',
        'image_name',
        'image_url',
    ];
}
