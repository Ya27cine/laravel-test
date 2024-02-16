<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nbUsers = (int) $this->command->ask("How many of users you want generate ?", 7);
       
        User::factory($nbUsers)->create();
    }
}
