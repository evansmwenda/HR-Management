<?php

namespace Database\Seeders;

use App\Models\Payroll;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payroll::factory(300)->create();
    }
}
