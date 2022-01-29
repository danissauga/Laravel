<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'alt' => $this->faker->unique()->catchPhrase(),
            'src' => $this->faker->image('D:\xampp\htdocs\Laravel\2022-01-29\public\images', 640, 480, 'animals', false),
            'width' => '125',
            'height' => '125',
            'class' => 'img-thumbnail'
        ];
    }
}
