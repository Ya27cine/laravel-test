<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        if( $this->command->confirm("You want fresh data base ")){
            $this->command->call("migrate:fresh");
            $this->command->info("Data base was redreshed !");
        }

        $this->call([
            UsersTableSeeder::class,
            PostsTableSeeder::class,
            CommentsSeeder::class
        ]);
    }
}
