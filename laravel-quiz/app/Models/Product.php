<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'brand',
        'info',
        'category_id',
        'place_1',
        'place_2',
        'place_3',
        'place_4',
    ];
}
