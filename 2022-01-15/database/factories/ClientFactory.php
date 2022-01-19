<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
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
                'username' => $this->faker->unique()->userName(),
                'company_id' => $this->faker->numberBetween(1,30), 
                'image_url' => $this->faker->imageUrl()
            ];
    }
}
