<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Post>
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
            'title' => fake()->sentence(4),
            'mood' => fake()->randomElement(['senang', 'lelah', 'bersyukur', 'santai', 'semangat']),
            'body' => fake()->paragraphs(3, true),
            'published_at' => now(),
        ];
    }
}
