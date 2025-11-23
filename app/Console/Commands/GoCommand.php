<?php

namespace App\Console\Commands;

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

    }
}
