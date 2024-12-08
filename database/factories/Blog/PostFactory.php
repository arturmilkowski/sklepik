<?php

namespace Database\Factories\Blog;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog\Post>
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
        $title = fake()->sentence(3);
        $slug = str()->slug($title, '-');
        $approved = fake()->numberBetween($min = 0, $max = 1);
        // only approved post can be published
        if ($approved == 0) {
            $published = 0;
        } else {
            $published = fake()->numberBetween($min = 0, $max = 1);
        }

        return [
            'slug' => $slug,
            'title' => $title,
            'intro' => fake()->text(160),
            'content' => fake()->text,
            'site_description' => fake()->text(200),
            'site_keyword' => fake()->text(30),
            'approved' => $approved,
            'published' => $published,
            'comments_allowed' => fake()->numberBetween($min = 0, $max = 1),
        ];
    }
}
