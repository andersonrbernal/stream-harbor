<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->unique()->randomNumber(),
            'name' => fake()->name(),
            'description' => fake()->text(),
        ];
    }

    /**
     * Create a mock author instance with random attributes.
     *
     * @return static
     */
    public function mock(): static
    {
        return $this->state([
            'id' => fake()->unique()->randomNumber(),
            'name' => fake()->name(),
            'description' => fake()->text(),
        ]);
    }
}
