<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->firstName(),
            'description'=> $this->faker->sentence(6),
            'author_id'=> rand(1,100)
        ];
    }
}
