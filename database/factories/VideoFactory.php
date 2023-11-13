<?php

namespace Database\Factories;

use App\Models\MediaCategory;
use Faker\Provider\Youtube;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new Youtube($this->faker));

        return [
            'id' => fake()->unique()->randomNumber(),
            'title' => fake()->title(),
            'description' => fake()->realText(),
            'video_url' => $this->faker->youtubeUri(),
            'thumb_url' => fake()->imageUrl(),
            'media_category_id' => function () {
                return MediaCategory::factory()->create()->id;
            }
        ];
    }
}
