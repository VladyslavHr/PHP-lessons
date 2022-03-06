<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{Group,User};

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first();
        $group = Group::inRandomOrder()->first();

        $postable = [
            [
                'id' => $user->id,
                'type' => 'App\Models\User'
            ],
            [
                'id' => $group->id,
                'type' => 'App\Models\Group'
            ],
        ][rand(0, 1)];

        return [
            'author_id' => $user->id,
            'title' => $this->faker->address,
            'content' => $this->faker->text,
            'post_status' => ['protected', 'public'][rand(0, 1)],
            'allow_comments' => rand(0, 1),
            'postable_id' => $postable['id'],
            'postable_type' => $postable['type'],
            'comments_count' => 0,
        ];
    }
}
