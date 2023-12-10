<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Music>
 */
class MusicFactory extends Factory
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
            "title" => fake()->title(),
            "description" => fake()->text(),
            "music_url" => fake()->url(),
            'author_id' => function () {
                return Author::factory()->create()->id;
            },
        ];
    }

    /**
     * Create a mock music instance with random attributes.
     *
     * @return static
     */
    public function mock(): static
    {
        return $this->state([
            'id' => fake()->unique()->randomNumber(),
            "title" => fake()->title(),
            "description" => fake()->text(),
            "music_url" => fake()->url(),
            'author_id' => fake()->unique()->randomNumber(),
        ]);
    }
}
