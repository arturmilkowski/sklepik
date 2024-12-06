<?php

namespace Database\Factories\Order;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'total_price' => fake()->numberBetween(100, 500),
            'delivery_cost' => fake()->numberBetween(15, 20),
            'total_price_and_delivery_cost' => fake()->numberBetween(120, 520),
            'delivery_name' => fake()->word(),
            'comment' => fake()->words(4, true),
        ];
    }
}
