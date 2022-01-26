<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        return [
            'name' => $this->faker->unique()->catchPhrase(),
            'description' => $this->faker->realText($maxNbChars = 100, $indexSize = 2),
            'difficulty_id' => rand(1,4),
            'school_id' => rand(1,10)
        ];
    }
}
