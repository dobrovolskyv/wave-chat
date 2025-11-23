<?php

namespace Database\Seeders;


use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Post::factory(100)->create();

        //обновить данные после пивота
        $posts = Post::factory(100)->create();
        $tags = Tag::all();

        foreach ($posts as $post) {
            $post->tags()  ->attach($tags->random(fake()->numberBetween(1,5))->pluck('id'));
        }

    }
}
