<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeStartup extends Model
{
    use HasFactory;
    protected $fillable = [
        'priority',
        'category',
        'request_message',
        'price',
        'quantity',
        'amount',
        'image_name',
        'image_url',
    ];
}
