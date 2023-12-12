<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserRoleSeeder::class
        ]);


        Post::create([
            'user_id' => 2,
            'title' => fake('id_ID')->words(5, true),
            'description' => fake('id_ID')->sentence(),
            'category' => 'event',
            'priority_level' => 'biasa',
        ]);
    }
}
