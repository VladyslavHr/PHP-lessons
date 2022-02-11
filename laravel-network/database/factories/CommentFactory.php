<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{Post,User};

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first();
        $post = Post::inRandomOrder()->first();

        return [
            'user_id' => $user->id,
            'post_id' => $post->id,
            'text' => $this->faker->text(),
        ];
    }
}
