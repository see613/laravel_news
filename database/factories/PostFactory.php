<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
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
            'user_id' => User::factory(),
            'slug' => fake()->slug(),
            'headline' => fake()->realText(100),
            'body' => '<p>' . implode('</p><p>', fake()->paragraphs(4, false)) . '</p>',
            'is_published' => true
        ];
    }
}
