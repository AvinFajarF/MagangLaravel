<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'slug' => Str::slug($this->faker->sentence(5)),
            'image' => $this->faker->imageUrl(),
            'is_pinned' => $this->faker->boolean(),
            'content' => $this->faker->paragraphs(3, true),
            'created_by' => $this->faker->name(),
        ];
    }
}
