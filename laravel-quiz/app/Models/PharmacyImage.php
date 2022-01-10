<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PharmacyImage extends Model
{
    use HasFactory;

    public function asset()
    {
        return asset ('pharmacy-images/' . $this->url);
    }
}
