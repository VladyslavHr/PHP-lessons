<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;

    protected $fillable = [
        'pzs_kod',
        'address',
        'city',
        'images',
    ];


    // public function marks($pharmacy_id)
    // {
    //     if($this->marks) return $this->marks;

    //     $marks = Mark::where('product_id', $this->id)
    //         ->where('pharmacy_id', $pharmacy_id)
    //             ->where('user_id', auth()->user()->id)->first();
    //     if (!$marks) $marks = new Mark();

    //     $this->marks = $marks;

    //     return $marks;
    // }
}
