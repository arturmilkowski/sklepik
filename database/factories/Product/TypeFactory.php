<?php

namespace Database\Factories\Product;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product\Type>
 */
class TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $names = fake()->randomElements(
            [
                '10 ml', '15 ml', '20ml', '30 ml', '40 ml', '50 ml', '60 ml',
                '70 ml', '80 ml', '90 ml', '100 ml', '110 ml', '120 ml',
                '125 ml', '150 ml', '200 ml', '500 ml', '1000 ml', '2000 ml'
            ]
        );
        $name = $names[0];
        $slug = Str::slug($name);
        $prices = fake()->randomElements([30, 40, 80, 140, 180]);
        $price = $prices[0];
        $promoPrice = $prices[0];

        return [
            'slug' => $slug,
            'name' => $name,
            'price' => $price,
            'promo_price' => $promoPrice,
            'quantity' => fake()->numberBetween(1, 5),
            'description' => fake()->text,
            'hide' => fake()->boolean(),
            'created_at' => now(),
        ];
    }
}
