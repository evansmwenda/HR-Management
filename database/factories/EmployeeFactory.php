<?php

namespace Database\Factories;

use App\Models\Position;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'department_id' => Department::inRandomOrder()->first()->id,
            'position_id' => Position::inRandomOrder()->first()->id,
            'hire_date' => fake()->dateTimeBetween('-5 years', 'now'),
            'status' => fake()->randomElement(['active', 'on_leave', 'terminated']),
            'address' => fake()->streetAddress(),
            'type' => fake()->randomElement(['manager', 'employee']),
            'emergency_contact' => fake()->name(),
        ];
    }
}
