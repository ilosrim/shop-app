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
            "user_id" => 1,
            "category_id" => rand(1, 5),
            "title" => fake()->sentence(3),
            "description" => fake()->sentence(20),
            "content" => implode(" ", fake()->sentences(100)),
        ];
    }
}
