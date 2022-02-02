<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $dates = ['birth_date'];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'last_name',
        'birth_date',
        'city',
        'birth_city',
        'work',
        'study',
        'family_status',
        'phone',
        'about_yourself',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function groups()
    {
        return $this->hasMany(Group::class, 'creator_id')->limit(5);
    }

    public function posts()
    {
       return $this->morphMany(Post::class, 'postable');
    }

    public function getPostsPaginatedAttribute()
    {
        return $this->posts()->paginate(2, ['title', 'content', 'created_at'], 'posts-page');
    }

    public function avatarUrl()
    {
        return asset($this->avatar);
    }
}
