<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'profile_id' => Profile::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'title' => fake()->realTextBetween(20,50),
            'content' => fake()->realTextBetween(150,255),
            'image_path' => fake()->imageUrl(),
            'published_at' => fake()->dateTime,
            'status' => fake()->numberBetween(0,4),
            'is_active' => fake()->boolean,
        ];
    }
}
