<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Console\Command;

class GoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
//        $profile = Profile::first();
//        $post = Post::first();
//        dd($post->profile);

//        $user = User::factory()->create();
//        $user -> profile->create([
//            'name'=> "ILIA"
//        ]);

//        $user = User::first();
//        dd(User::query());
//        dd($user->profile());

//        $post = Post::first();

        //attach - добавление
        //detach - удаление, можно указать массив
        //sync - удаляет абсюлтно все связи кроме тех, что указали, в масситва
        //syncWithoutDetaching - не добавляет если есть связь, но другие не трогает
        //toggle - если есть связь удаляет, если нет добавляет
        //updateExistingPivot - позволяет обновлять атрибута у пивотнтой таблицы

//        $post->tags()->toggle([5,6,7]);


//        $post = Profile::all();
//        $post->likedPosts()->attach(1);

        $category = Category::first();

        dd($category->comments);
    }
}
