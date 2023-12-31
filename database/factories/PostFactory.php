<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->text(10),
            'created_at' => $this->faker->dateTime(),
            'description' => $this->faker->text(200),
            'preview' => $this->faker->text(50),
            'thumbnail' => $this->faker->imageUrl(600, 600, 'animals', true, null, false, 'jpg'),
        ];
    }
}
