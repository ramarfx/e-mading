<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'        => mt_rand(1, 30),
            'title'          => fake()->words(5, true),
            'description'    => fake()->paragraph(50, true),
            'category'       => fake()->randomElement(['pengumuman', 'event', 'artikel', 'ekstrakulikuler']),
            'priority_level' => fake()->randomElement(['biasa', 'penting']),
            'published_at'   => now(),
            'is_published'   => true
        ];
    }
}
