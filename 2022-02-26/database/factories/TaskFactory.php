<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->realText($maxNbChars = 50, $indexSize = 2),
            'logo' => $this->faker->image('D:\xampp\htdocs\Laravel\2022-02-26\public\images', 640, 480, 'people', false), 
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->dateTimeBetween(),
            'owner_id' => rand(1,10),
        ];
    }
}
