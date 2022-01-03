<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\CategoryMark;

class Category extends Model
{
    use HasFactory;

    private $marks;

    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function marks($pharmacy_id)
    {
        if($this->marks) return $this->marks;

        $marks = CategoryMark::where('category_id', $this->id)
            ->where('pharmacy_id', $pharmacy_id)
                ->where('user_id', auth()->user()->id)->first();
        if (!$marks) $marks = new CategoryMark();

        $this->marks = $marks;

        return $marks;
    }
}
