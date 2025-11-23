<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'email' => 'email@mail.ru'
            ]
            , $user);
        // User::factory(10)->create();
        $this->call([
            PostSeeder::class,
            CategorySeeder::class,
        ]);
    }
}
