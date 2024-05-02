<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->sentence(mt_rand(2, 10)),
            "slug" => $this->faker->slug(),
            "excerpt" => $this->faker->paragraph(),
            "body" => $this->faker->paragraph(mt_rand(4, 10)),
            "user_id" => mt_rand(1, 3),
            "category_id" => mt_rand(1, 3)
        ];
    }
}
