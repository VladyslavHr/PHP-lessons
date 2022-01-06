<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pharmacy_image;

class Pharmacy extends Model
{
    use HasFactory;

    protected $fillable = [
        'pzs_kod',
        'address',
        'city',
        'location',
    ];


    public function images()
    {
        return $this->hasMany(PharmacyImage::class);
    }

    public function location($pharmacy_id)
    {
        if($this->location) return $this->location;

        $location = Pharmacy::where('pharmacy_id', $this->id);
        if (!$location) $location = new Pharmacy();

        $this->location = $location;

        return $location;
    }

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
