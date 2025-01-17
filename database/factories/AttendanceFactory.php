<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = fake()->dateTimeBetween('-3 months', 'now');
        $checkIn = Carbon::parse($date)->addHours(fake()->numberBetween(7, 10))->addMinutes(fake()->numberBetween(0, 59));
        $checkOut = (clone $checkIn)->addHours(fake()->numberBetween(7, 10))->addMinutes(fake()->numberBetween(0, 59));
        
        return [
            'employee_id' => Employee::inRandomOrder()->first()->id,
            'date' => $date,
            'check_in' => $checkIn,
            'check_out' => $checkOut,
            'status' => fake()->randomElement(['present', 'late', 'sick_leave', 'absent']),
            'notes' => fake()->optional(0.3)->sentence(),
        ];
    }
}
