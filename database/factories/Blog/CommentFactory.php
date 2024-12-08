<?php

namespace Database\Factories\Blog;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ip' => fake()->ipv4,
            'agent' => fake()->userAgent,
            'content' => fake()->text,
            'author' => fake()->firstName,
            'approved' => fake()->numberBetween($min = 0, $max = 1),
        ];
    }
}
