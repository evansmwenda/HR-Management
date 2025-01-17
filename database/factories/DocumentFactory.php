<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $fileTypes = ['pdf', 'doc', 'docx', 'jpg', 'png'];
        $documentTypes = ['id_card', 'resume', 'passport', 'cover_letter', 'contract','leave_application','good_conduct'];
        $fileNumber = fake()->numberBetween(1, 10);
        
        return [
            'employee_id' => Employee::inRandomOrder()->first()->id,
            'title' => fake()->words(3, true),
            'type' => fake()->randomElement($documentTypes),
            'file_path' => 'docs/file' . $fileNumber . '.' . fake()->randomElement($fileTypes),
        ];
    }
}
