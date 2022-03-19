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
        $test_data = ['Test MB','Test UAB','Test II'];
        return [
            'name' =>$this->faker->firstName(),
            'surname' =>$this->faker->lastName(),
            'description' =>$this->faker->paragraph(3,true),
            'company_name' => $test_data[rand(0,2)]
        ];
    }
}
