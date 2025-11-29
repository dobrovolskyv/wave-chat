<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $post = Post::inRandomOrder()->first();

        return [
            'profile_id' => Profile::inRandomOrder()->first()->id,
            'post_id' => $post->id,
            'commentable_id' => $post->id,
            'commentable_type' => Post::class,
            'parent_id' => null,
            'content' => fake()->realTextBetween(5, 50),
            'likes' => fake()->numberBetween(1, 100),
            'reply' => fake()->numberBetween(1, 10),
        ];
    }
}
