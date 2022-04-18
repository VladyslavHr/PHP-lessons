<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Http;
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



Artisan::command('bot', function () {

    $message = 'Hii ii aaa';
    $send_message_url = 'https://api.telegram.org/bot5193208083:AAFA7HE-qZwbB3I24aL034RnrFmcbsntcEU/sendMessage?chat_id=-1001741099979&text=' . $message;

file_get_contents($send_message_url);
// echo $send_message_url;


// $response = Http::get($send_message_url);

// print_r($response->json());



});


Artisan::command('img', function(){

print_r(get_rand_img_()) ;

});


function get_rand_img_()
{
    $fiels = scandir(public_path('images/products-examples'));

    for ($i=0; $i < count($fiels) ; $i++) {
        return $fiels;
    }
}
