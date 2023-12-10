<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MediaCategory>
 */
class MediaCategoryFactory extends Factory
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
            'name' => fake()->word()
        ];
    }

    /**
     * Create a mock media category instance with random attributes.
     */
    public function mock(): static
    {
        return $this->state([
            'id' => fake()->unique()->randomNumber(),
            'name' => fake()->word()
        ]);
    }
}
