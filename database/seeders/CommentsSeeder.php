<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();

        if($posts->count() == 0){
            $this->command->warn("Please create some posts !");
            return;
        }

        $nbComments = (int) $this->command->ask("How many of comments you want generate ?", 77);


        $comments = Comment::factory($nbComments)->make()->each( function($comment) use ($posts){
            $comment->post_id = $posts->random()->id;
            $comment->save();
        });
    }
}
