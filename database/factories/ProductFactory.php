<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => fake()->numberBetween(1, 10), // Assuming a factory for Category exists
            'name' => fake()->unique()->word(),
            'price' => fake()->randomFloat(2, 1, 999), // Example: 54.99
            'description' => fake()->sentence(),
            'banner' => fake()->imageUrl(),
        ];
    }
}
