<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Mark;

class Product extends Model
{
    use HasFactory;

    public $marks;

    protected $fillable = [
        'title',
        'brand',
        'info',
        'category_id',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function marks($pharmacy_id)
    {
        if($this->marks) return $this->marks;

        $marks = Mark::where('product_id', $this->id)
            ->where('pharmacy_id', $pharmacy_id)
                ->where('user_id', auth()->user()->id)->first();
        if (!$marks) $marks = new Mark();

        $this->marks = $marks;

        return $marks;
    }

    public function image_src()
    {
        if (file_exists(public_path('/product-images/' . $this->title . '.jpg')))
        {
            return '/product-images/' . $this->title . '.jpg';
        }else{
            return '/images/no-image.jpg';
        }

    }
}
