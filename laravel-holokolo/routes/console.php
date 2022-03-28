<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\Name;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');



// update names to DB

Artisan::command('name-days:update', function (){
	$arr = file_get_contents(storage_path('names.json'));
    $arr = json_decode($arr, true);
    $month_num = 1;
    Name::truncate();

    $this->withProgressBar($arr, function ($months) use (&$month_num) {

        foreach ($months as $day => $name_string) {
            $names_arr = explode(', ', $name_string);
            foreach ($names_arr as $name){
                Name::create([
                    'name' => $name,
                    'month' => $month_num,
                    'day' => $day,
                ]);
            }
        }
        $month_num++;
	});

});

Artisan::command('name-today', function(){
    $day = date('j');
    $month = date('n');
    $today = Name::where('day', $day)->where('month', $month)->pluck('name')->toArray();

    $today_names = implode(', ', $today);


    echo ($today_names);
});


