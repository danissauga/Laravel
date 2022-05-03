<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->company(),
            'work_time_from' =>'10:00:00',
            'work_time_till' => '22:00:00',
            'tables_count' => rand(5,25),
        ];
    }
}
