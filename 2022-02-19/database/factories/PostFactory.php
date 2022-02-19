<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->catchPhrase(),
            'postContent' => $this->faker->paragraph(3, true),
            'category_id' => rand(1,10)
        ];
    }
}
