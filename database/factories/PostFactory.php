<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'description' => $this->faker->sentence(20),
            'image' => $this->faker->randomElement([
                'template1.jpg', 
                'template2.jpg',
                'template3.jpg',
                'template4.jpg',
                'template5.jpg',
            ]),
            'user_id' => $this->faker->randomElement([1, 2, 3]),
        ];
    }
}
