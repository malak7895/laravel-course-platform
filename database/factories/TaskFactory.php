<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->sentence(),
            'priority' => fake()->randomElement(['low', 'medium', 'high']),
            'due_date' => fake()->date(),
            'completed' => fake()->boolean(50), // عدلناها تبقى completed زي الميجريشن بالضبط
            'points' => fake()->numberBetween(5, 50),
        ];
    }
}