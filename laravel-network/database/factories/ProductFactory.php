<?php

namespace Database\Factories;

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

        $image = 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1099&q=80';

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
