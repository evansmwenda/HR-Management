<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Leave>
 */
class LeaveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('-1 month', '+2 months');
        $endDate = Carbon::parse($startDate)->addDays(fake()->numberBetween(1, 14));
        
        return [
            'employee_id' => Employee::inRandomOrder()->first()->id,
            'leave_type' => fake()->randomElement(['annual_leave', 'sick_leave', 'paternal_leave', 'maternal_leave', 'unpaid_leave',]),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'leave_status' => fake()->randomElement(['pending', 'approved', 'rejected']),
            'reason' => fake()->sentence(),
            // 'approved_by' => function (array $attributes) {
            //     // Only set approved_by if status is approved
            //     return $attributes['leave_status'] === 'approved' 
            //         ? Employee::where('id', '!=', $attributes['employee_id'])
            //         // ->where('type', 'manager')
            //             ->inRandomOrder()
            //             ->first()
            //             ->id 
            //         : null;
            // },
        ];
    }
}
