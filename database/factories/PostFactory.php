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
    public function definition()
    {
        return [
            'category_id'=>rand(2,13),
            'title_uz' => $this->faker->sentence,
            'title_ru' => $this->faker->sentence,
            'body_uz' => $this->faker->text,
            'body_ru' => $this->faker->text,
            'img' => 'people.png',
            'view' => rand(0,50),
            'special' => rand(0,1),
        ];
    }
}
