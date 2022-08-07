<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Enums\BlogStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->realTextBetween(20,40),
            'description' => $this->faker->realTextBetween(),
            'anons' => $this->faker->realTextBetween(50,80),
            'slug' => $this->faker->slug() . time(),
            'image' => $this->faker->imageUrl(),
            'author_id' => $this->faker->numberBetween(1,10),
            'status' => BlogStatus::ACTIVE->value
        ];
    }
}
