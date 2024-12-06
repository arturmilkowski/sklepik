<?php

namespace Database\Factories\Order;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_id' => fake()->numberBetween(1, 3),
            'type_name' => fake()->randomElements(['10 ml', '15 ml'])[0],
            'type_size_id' => fake()->numberBetween(1, 6),
            'name' => fake()->randomElements(
                ['lawenda dla panów', 'bergamota dla panów']
            )[0],
            'concentration' => fake()->randomElements(
                ['woda kolońska', 'woda toaletowa']
            )[0],
            'category' => fake()->randomElements(
                ['damskie', 'męskie', 'damsko-męskie']
            )[0],
            'price' => fake()->randomElements([60, 90])[0],
            'quantity' => fake()->numberBetween(1, 5),
            'subtotal_price' => fake()->randomElements(['60.00', '90.00'])[0],
        ];
    }
}
