<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => 'Laravel Development',
            'description' => 'Learn Laravel framework from scratch.',
            'price' => 150.00,
            'hours' => 30,
            'level' => 'beginner',
            'is_available' => true,
        ];
    }
}