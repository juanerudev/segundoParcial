<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_name' => fake()->words(2, true),
            'category_description' => fake()->sentence(10),
            'category_rating' => fake()->randomFloat(1, 1, 5),
            'category_status' => fake()->boolean(80),
        ];
    }
}
