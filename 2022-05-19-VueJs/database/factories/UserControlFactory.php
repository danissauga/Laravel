<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserControlFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'=> $this->faker->firstname(),     
            'last_name'=> $this->faker->lastname(),
            'email'=> $this->faker->email(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'address' => $this->fakerstreetAddress(),
        ];
    }
}
