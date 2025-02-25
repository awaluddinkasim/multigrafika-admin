<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sticker>
 */
class StickerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'price' => fake()->randomFloat(2, 0, 100),
            'freelance_price' => fake()->randomFloat(2, 0, 100),
            'type' => fake()->randomElement(['car', 'motorcycle']),
            'brand' => fake()->randomElement(['honda', 'yamaha', 'kawasaki', 'suzuki']),
            'image' => 'example.jpg',
        ];
    }
}
