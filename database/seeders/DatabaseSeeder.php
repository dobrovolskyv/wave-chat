<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = [
            'name' => 'user',
            'email' => 'email@mail.ru',
            'password' => Hash::make('123123'),
            'phone' => '123123',
        ];

        $user = User::firstOrCreate([
                'email' => 'email@mail.ru',
                 'phone' =>'123123',
            ]
            , $user);

        Profile::create([
            'name' => $user->name,
            'user_id' => $user->id,
            'last_name' => $user->last_name ?? 'FAMILIA',

        ]);

        $this->call([
            ProfileSeeder::class,
            TagSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            ChatSeeder::class,
        ]);
    }
}
