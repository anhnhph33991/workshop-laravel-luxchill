<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Phone;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        ## N-N
        // for ($i = 0; $i < 10; $i++) {
        //     Role::create([
        //         'name' => fake()->text(20)
        //     ]);
        // }


        ## 1-N
        // for ($i = 0; $i < 10; $i++) {
        //     Post::create([
        //         'title' => fake()->text(100)
        //     ]);
        // }

        // for ($i = 1; $i < 11; $i++) {
        //     Comment::create([
        //         'post_id' => $i,
        //         'content' => fake()->text
        //     ]);

        //     Comment::create([
        //         'post_id' => $i,
        //         'content' => fake()->text
        //     ]);

        //     Comment::create([
        //         'post_id' => $i,
        //         'content' => fake()->text
        //     ]);

        //     Comment::create([
        //         'post_id' => $i,
        //         'content' => fake()->text
        //     ]);
        // }


        ## 1-1
        // $users = User::pluck('id')->all();

        // foreach ($users as $id) {
        //     Phone::query()->create([
        //         'user_id' => $id,
        //         'value' => fake()->unique()->phoneNumber()
        //     ]);
        // }


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
