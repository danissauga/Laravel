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
        $difficulty_levels=array('Easy level', 'Middle level', 'High level');
        return [
            'name' => $this->faker->unique()->catchPhrase(),
            'description' => $this->faker->realText($maxNbChars = 100, $indexSize = 2),
            'difficulty' => $difficulty_levels[rand(0,2)],
            'school_id' => rand(1,10)
        ];
    }
}
