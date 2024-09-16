<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'adult_count',
        'child_count',
        'pet',
        'land_budget',
        'building_budget',
        'land_area',
        'building_area',
        'floors',
        'layout',
        'regularCars',
        'compactCars',
        'motorcycles',
        'bicycles',
        'construction_area',
        'date',
        'current_home_issues',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];
}
