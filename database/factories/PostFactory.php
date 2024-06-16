<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $title = fake()->sentence(3, true);

        return [
            'user_id' => User::factory(),
            'title' => $title,
            'slug' => str($title)->slug(),
            'content' => fake()->realText(400),
            'published_at' => fake()->dateTime(),
            'featured' => fake()->boolean(),
            'status' => fake()->word(),
        ];
    }
}
