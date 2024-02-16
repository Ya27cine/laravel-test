<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        if($users->count() == 0){
            $this->command->warn("Please create some users !");
            return;
        }

        $nbPosts = (int) $this->command->ask("How many of posts you want generate ?", 17);


        $posts = Post::factory($nbPosts)->make()->each( function($post) use ($users){
            $post->user_id = $users->random()->id;
            $post->save();
        });
    }
}
