<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersPostsCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::each(function ($u){
            $u->posts()->saveMany(\App\Models\Post::factory(rand(1, 5))->make())
                ->each(function ($p){
                    $p->comments()->saveMany(\App\Models\Comment::factory(rand(1, 5))->make());
                });
        });
    }
}
