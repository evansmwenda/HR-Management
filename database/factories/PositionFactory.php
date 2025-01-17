<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Position>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $minSalary = fake()->numberBetween(30000, 100000);
        $maxSalary = $minSalary + fake()->numberBetween(10000, 50000);


        return [
            'title'  => fake()->jobTitle(),
            'description'  => fake()->paragraph(),
            'salary_range_start' => $minSalary,
            'salary_range_end' => $maxSalary,
            'department_id' => Department::inRandomOrder()->first()->id,
        ];
    }
}
