<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
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
            'name' => fake()->country(),
            'country_code' => fake()->countryISOAlpha3(),
        ];
    }

    /**
     * Create a mock country instance with random attributes.
     *
     * @return static
     */
    public function mock(): static
    {
        return $this->state([
            'id' => fake()->unique()->randomNumber(),
            'name' => fake()->country(),
            'country_code' => fake()->countryISOAlpha3(),
        ]);
    }
}
