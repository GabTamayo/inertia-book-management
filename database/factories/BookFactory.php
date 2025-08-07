<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'photo' => null,
            'title' => fake()->sentence(3),
            'price' => fake()->randomFloat(2, 50, 1500),
            'format' => fake()->randomElement(['Paperback', 'Hardcover']),
            'date_bought' => fake()->date(),
            'num_pages' => fake()->numberBetween(100, 1500),
        ];
    }
}
