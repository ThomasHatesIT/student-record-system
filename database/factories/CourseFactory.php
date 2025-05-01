<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $courseNames = [
            'Computer Science',
            'Information Technology',
            'Business Administration',
            'Mechanical Engineering',
            'Civil Engineering',
            'Electrical Engineering',
            'Psychology',
            'Nursing',
            'Accounting',
            'Marketing',
            'Physics',
            'Mathematics',
            'Biology',
            'Economics',
            'Political Science',
        ];

        return [
            'name' => $this->faker->randomElement($courseNames),
            'description' => $this->faker->paragraph(),
        ];
    }
}
