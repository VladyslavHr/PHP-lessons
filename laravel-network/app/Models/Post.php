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
        $month_ru = [
            'Января',
            'Февраля',
            'Марта',
            'Апреля',
            'Мая',
            'Июня',
            'Июля',
            'Августа',
            'Сентября',
            'Октября',
            'Ноября',
            'Декабря',
        ];
        $month_eng = [
            'January',
            'February ',
            'March ',
            'April',
            'May',
            'June ',
            'July ',
            'August',
            'September',
            'October',
            'November',
            'December',
        ];
        $month = date('n')-1;
        $date = $this->created_at->format('d F Y H:i');
        // return $arr[$month].' '.$date;
        return str_replace($month_eng, $month_ru, $date);
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
