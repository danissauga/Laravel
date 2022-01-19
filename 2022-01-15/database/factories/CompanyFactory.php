<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $company_types = array('AB','UAB','JSC','UADBB','TŪB');
        return [
            'name' => $this->faker->lastName(),
            'type' => $company_types[rand(0,4)],
            'description' => $this->faker->realText($maxNbChars = 50, $indexSize = 2)
        ];
    }
}
