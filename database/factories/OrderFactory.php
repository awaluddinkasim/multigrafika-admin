<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
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
            'user_id' => fake()->numberBetween(1, 10),
            'sticker_id' => fake()->numberBetween(1, 10),
            'price' => fake()->randomFloat(2, 0, 100),
            'freelance_price' => fake()->randomFloat(2, 0, 100),
            'status' => fake()->randomElement(['pending', 'completed', 'cancelled']),
        ];
    }
}
