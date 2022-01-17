<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'avatar',
        'creator_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function posts()
    {
       return $this->morphMany(Post::class, 'postable');
    }
}
