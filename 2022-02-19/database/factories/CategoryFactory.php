<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
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
            'description' => $this->faker->paragraph(3, true),
            'status_id' => rand(1,3)
        ];
    }
}
