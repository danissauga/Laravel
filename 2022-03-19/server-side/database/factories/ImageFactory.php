<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'title' => $this->faker->lastName(),
           'alt' => $this->faker->lastName(),
           'url' => $this->faker->imageUrl(),
           'description' => $this->faker->paragraph(3, true),
        ];
    }
}
