<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Name extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'day',
        'month',
    ];

    public function date_formated(){
        // $month_eng = [
        //     'January',
        //     'February ',
        //     'March ',
        //     'April',
        //     'May',
        //     'June ',
        //     'July ',
        //     'August',
        //     'September',
        //     'October',
        //     'November',
        //     'December',
        // ];

        // $month = date('n')-1;
        // $date = $this->created_at->format('d F Y H:i');

        // return ($month_eng, $date);
    }
}
