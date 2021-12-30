<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Category_mark;

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

        $marks = Category_mark::where('category_id', $this->id)
            ->where('pharmacy_id', $pharmacy_id)
                ->where('user_id', auth()->user()->id)->first();
        if (!$marks) $marks = new Category_mark();

        $this->marks = $marks;

        return $marks;
    }
}
