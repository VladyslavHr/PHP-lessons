<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use PhpParser\Builder\Class_;
use App\Models\{User, Group, Post};

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





class MyClass
{
    public $number = 5;

    public function get_number()
    {
        return $this->number * 2;
    }

    public function __get($name)
    {
        if ($name === 'string'){
            return 'magic';
        }
        if ($name === 'nuber_x'){
            return $this->number * 10;
        }

    }
}



Artisan::command('asd', function () {


    $posts = Post::where('author_id', 7)->get();

    // print_r($user->posts);

    // return;

    foreach ($posts as $key => $post) {

        print_r($post->id . '|');

        if ($post->images) {
            $images = explode(',', $post->images);
            foreach ($images as $image) {
                $path = public_path($image);
                if (file_exists($path)) { unlink($path); }
            }
        }

    }
});
