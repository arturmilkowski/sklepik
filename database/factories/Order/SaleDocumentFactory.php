<?php

namespace Database\Factories\Order;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order\SaleDocument>
 */
class SaleDocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->word();
        $slug = str()->slug($name);
        $description = $this->faker->word();

        return [
            'slug' => $slug,
            'name' => $name,
            'description' => $description,
        ];
    }
}
