<?php

namespace Database\Factories\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'surname' => fake()->lastName(),
            'street' => fake()->streetAddress(),
            'zip_code' => fake()->postcode(),
            'city' => fake()->city(),
            'phone' => fake()->randomNumber(9),
        ];
    }
}
