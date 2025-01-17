<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payroll>
 */
class PayrollFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $periodStart = fake()->dateTimeBetween('-6 months', 'now');
        $periodEnd = Carbon::parse($periodStart)->endOfMonth();
        $basicSalary = fake()->numberBetween(30000, 100000);
        
        $allowances = [
            'transport' => fake()->numberBetween(1000, 3000),
            'meal' => fake()->numberBetween(500, 1500),
            'housing' => fake()->numberBetween(5000, 15000),
            'overtime' => fake()->optional(0.3)->numberBetween(1000, 5000),
        ];

        $deductions = [
            'tax' => round($basicSalary * 0.1, 2),
            'insurance' => fake()->numberBetween(1000, 3000),
            'pension' => round($basicSalary * 0.05, 2),
            'loan' => fake()->optional(0.2)->numberBetween(2000, 5000),
        ];

        $totalAllowances = array_sum($allowances);
        $totalDeductions = array_sum($deductions);
        $netSalary = $basicSalary + $totalAllowances - $totalDeductions;

        return [
            'employee_id' => Employee::inRandomOrder()->first()->id,
            'period_start' => $periodStart,
            'period_end' => $periodEnd,
            'basic_salary' => $basicSalary,
            'allowances' => $allowances,
            'deductions' => $deductions,
            'net_salary' => $netSalary,
        ];
    }
}
