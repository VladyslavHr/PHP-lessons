<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $image =  get_rand_img_();

        // $title = $this->faker->sentence(3, true);
        $title = $this->faker->catchPhrase();

        return [
            'title' => $title,
            'user_id' => 1,
            'description' => $this->faker->realText(200),
            'price' => $this->faker->randomFloat(2, 10,100),
            'image' => $image,
            'slug' => Str::slug($title),
        ];
    }
}


// Загрузка картинок рандомных с файла
// scandir()

function get_rand_img_()
{
    // $dir = public_path('images/products-examples');
    $files = scandir(public_path('images/products-examples'));

    unset($files[0]);
    unset($files[1]);

    // $result = [];

    // foreach ($files as $file) {
    //     $extension = pathinfo($file, PATHINFO_EXTENSION);
    //     if (in_array(strtolower($extension), ['jpg', 'png'])) {
    //         $result[] = $file;
    //     }
    // }

    $result = array_filter($files, function ($file){
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        return in_array(strtolower($extension), ['jpg', 'png']);
    });

    return '/images/products-examples/' . $result[array_rand($result)];

    // return;
    // $images = glob($dir . '/*.{[jJ][pP][gG],[jJ][pP][eE][gG],png,}', GLOB_BRACE);

    // if(!$images) return '/images/no-image.png';

    // $image = array_map(function($path) {

    //     return pathinfo($path, PATHINFO_BASENAME);
    //     // $ret = explode('/', $path);

    //     // return end($ret);
    // }, $images);

    // return '/images/products-examples/' . $images[array_rand($images)];

}


// function RandImg()
// {
//     $images = glob('/images/products-examples' . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

//     $randomImage = $images[array_rand($images)];
//     return $randomImage;
// }

    // function get_randome_img()
    // {
        // $images = scandir('/images/products-examples');


        // return $images;


        // $imagesDir = '/images/products-examples/';

        // $images = glob($imagesDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

        // $randomImage = $images[array_rand($images)];

        // return $randomImage;

        // $products = Product::all();

        // $dir = '/images/products-examples/' . '.jpg';
        // $scan = scandir($dir);

        // echo $scan;



        // for($i = 0; $i < count($scan ); $i++)

        // {



        //     return $scan [$i];

        // }

        // for ($i=0; $i < count($products); $i++) {
        //     $dir = scandir('/images/products-examples/' .$i. 'jpg');
        //     // $a = scandir($dir);
        // }

        // echo $dir;

        // dd($a);

        // return $a;

    // }


//     function get_rand_img_()
// {
//     $arr = array();
//     $dir = '/../public/images/products-examples';
//     $list = scandir($dir);
//     foreach($list as $file)
//     {
//         if(!isset($img))
//         {
//             $img = '';
//         }
//         if(is_file($dir . '/' . $file))
//         {
//             $ext = end(explode('.', $file));
//             if($ext == 'gif' || $ext == 'jpeg' || $ext == 'jpg' || $ext == 'png' || $ext == 'GIF' || $ext == 'JPEG' || $ext == 'JPG' || $ext == 'PNG')
//             {
//                 array_push($arr, $file);
//                 $img = $file;
//             }
//         }
//     }
//     if($img != '')
//     {
//         $img = array_rand($arr);
//         $img = $arr[$img];
//     }
//     $img = str_replace("'", "\'", $img);
//     $img = str_replace(" ", "%20", $img);
//     return $img;
// }

// function get_rand_img_()
// {
//     $files = scandir(public_path('images/products-examples'));

//     for ($i=0; $i < count($files) ; $i++) {
//         return $fiels[$i];
//     }
// }




//
