<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->catchPhrase(),
            'excerpt' => $this->faker->paragraph(4),
            'description' => $this->faker->paragraph(2),
            'author'=> $this->faker->name(),
            'image_id' => rand(1,10)
        ];
    }
}
