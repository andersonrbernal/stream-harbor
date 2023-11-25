<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Interaction>
 */
class InteractionFactory extends Factory
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
            'liked' => fake()->randomElement([true, false]),
            'viewed' => fake()->randomElement([true, false]),
            'user_id' => function () {
                return User::inRandomOrder()->first()->id ?? User::factory()->create()->id;
            },
            'video_id' => function () {
                return Video::inRandomOrder()->first()->id ?? Video::factory()->create()->id;
            },
        ];
    }
}
