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



Artisan::command('name-days:update', function (){
	$arr = file_get_contents(storage_path('names.json'));
    $arr = json_decode($arr, true);
	// print_r($arr);
	// return;
    $month_num = 1;
    Name::truncate();

    $this->withProgressBar($arr, function ($months) use (&$month_num) {
        // print_r('$counter++');
        // print_r('$month');
        // echo $counter;

        foreach ($months as $day => $name_string) {
            // Name::create([
            //     'name' => $name_string,
            //     'month' => $month_num,
            //     'day' => $day,
            // ]);
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
		// echo $item . '|'.$item[6] . PHP_EOL;
		// return;
		// if (trim($item[6])) {
		// 	$city = $item[6];
		// }elseif (trim($item[2])) {
		// 	$city = $item[2];
		// }

	});
	// echo PHP_EOL;

});

Artisan::command('name-today', function(){
    $day = date('j');
    $month = date('n');
    $today = Name::where('day', $day)->where('month', $month)->pluck('name')->toArray();

    // print_r($today);
    // $array = [];
    // foreach ($today as $today_name){
    //     $array[] = $today_name->name;
    // }
    $today_names = implode(', ', $today);
    // // foreach ($today as $today_names){

    // // }

    echo ($today_names);
});


// Artisan::command('info', function(){
//     $names = Name::all()->toArray();
//     $arr = [];
//     foreach ($names as $name){
//         $arr[] = $name->month;
//     }
//     $name = implode(', ', $names);

//     echo ($name);
// });
