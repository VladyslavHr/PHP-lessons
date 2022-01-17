<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'title',
        'content',
        'post_status',
        'comment_status',
        'postable_id',
        'postable_type',
        'comment_count',
    ];

    protected $casts = [
        'created_at' => 'datetime:d F Y H:i',
    ];

    public function date_formated()
    {
        $arr = [
            'января',
            'февраля',
            'марта',
            'апреля',
            'мая',
            'июня',
            'июля',
            'августа',
            'сентября',
            'октября',
            'ноября',
            'декабря',
        ];
        $month = date('n')-1;
        $date = $this->created_at->format('d Y H:i');
        return $arr[$month].' '.$date;
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // $post->postable
    public function postable()
    {
        return $this->morphTo();
    }
}
