<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
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

    public function subscribes($with = [])
    {
       return Group::with($with)->where([
        'user_id' => auth()->user()->id,
    ])->join('subscribers', 'subscribers.group_id', '=', 'groups.id')->get();
    }

    public function followings($with = [])
    {
       return User::with($with)->where([
        'current_user_id' => auth()->user()->id,
    ])->join('followers', 'followers.friend_user_id', '=', 'users.id')->paginate(12);
    }

    public function followers($with = [])
    {
        return User::with($with)->where([
            'friend_user_id' => auth()->user()->id,
        ])->join('followers', 'followers.current_user_id', '=', 'users.id')->paginate(12);
    }

    public function friends($with = [])
    {
        return User::whereIn('id', function($query)
        {
            $query->select('users.id')
            ->from('users')->where([
                'friend_user_id' => auth()->user()->id,
            ])->join('followers', 'followers.current_user_id', '=', 'users.id')->get();
        })->whereIn('id', function($query)
        {
            $query->select('users.id')
            ->from('users')->where([
                'current_user_id' => auth()->user()->id,
            ])->join('followers', 'followers.friend_user_id', '=', 'users.id')->get();
        })
        ->with($with)
        ->paginate(12);
    }




    public function groups()
    {
        return $this->hasMany(Group::class, 'creator_id')->limit(5);
    }

    public function posts()
    {
       return $this->morphMany(Post::class, 'postable')->orderByDesc('created_at');
    }

    public function getFriendsAttribute()
    {
        return User::limit(10)->get();
    }

    public function getPostsPaginatedAttribute()
    {
        if ($this->is_friend){
            $posts = Post::where('postable_id', $this->id)
            ->where('postable_type', get_class($this) ) //'App\Models\User'
            ->orderByDesc('created_at')
            ->paginate(5, ['*'], 'posts-page');
        }else{
            $posts = Post::where('postable_id', $this->id)
            ->where('postable_type', get_class($this) ) //'App\Models\User'
            ->where('post_status', 'public')
            ->orderByDesc('created_at')
            ->paginate(5, ['*'], 'posts-page');
        }




        return $posts;
        // return $this->posts()->paginate(5, ['*'], 'posts-page');
    }

    public function getIsFriendAttribute()
    {
        $current_user_id = auth()->user()->id;
        $friend_user_id = $this->id;
        $is_friend = Db::table('followers')
            ->where('current_user_id', $current_user_id)
            ->where('friend_user_id', $friend_user_id)
            ->first();
       return $is_friend ? 1 : 0;
    }


    // public function getAvatarAttribute()
    // {
    //     return asset('/storage/'.$this->attributes['avatar']);
    // }

    public function avatarUrl()
    {
        return asset('/storage/'.$this->avatar);
    }

}
