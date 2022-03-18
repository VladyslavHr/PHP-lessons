<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function is_subscribed()
    {
        $subscription = Db::table('subscribers')
            ->where('user_id', auth()->user()->id)
            ->where('group_id', $this->id)
            ->first();

        return $subscription ? 1 : 0;

    }


    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function posts()
    {
       return $this->morphMany(Post::class, 'postable')->orderByDesc('created_at');
    }

    public function getPostsPaginatedAttribute()
    {
        return $this->posts()->paginate(5, ['*'], 'posts-page');
    }
}
