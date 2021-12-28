<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'pharmacy_id',
        'pharmacy_pzs',
        'product_title',
        'product_brand',
        'mark_1',
        'mark_2',
        'mark_3',
        'mark_4',
        'user_id',
    ];
}
