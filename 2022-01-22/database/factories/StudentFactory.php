<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->FirstName(),
            'surename' => $this->faker->lastName(),
            'group_id' => $this->faker->numberBetween(1,10),
            'image_url' => $this->faker->imageUrl()
        ];
    }
}
