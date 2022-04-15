<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'price',
        'description',
        'image',
        'status',
        'slug',
    ];

    public function images()
    {
       return $this->hasMany(ProductImage::class)->limit(10);
    }
}
