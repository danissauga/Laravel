<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' => $this->faker->firstName(),
            'surename' => $this->faker->lastName(),
            'username' => $this->faker->userName(),
            'description' => $this->faker->sentence(5)
            //
        ];
    }
}
