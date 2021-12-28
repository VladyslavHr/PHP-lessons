<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_mark extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'pharmacy_id',
        'pharmacy_pzs',
        'category_name',
        'mark_1',
        'mark_2',
        'mark_3',
        'mark_4',
        'user_id',
    ];
}
