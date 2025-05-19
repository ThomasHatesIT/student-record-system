<?php

namespace Database\Factories;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    public function definition(): array
    {
        $user = User::factory()->create(['role' => 'student']);
        $course = Course::inRandomOrder()->first() ?? Course::factory()->create();

        return [
            'student_id' => strtoupper('STD' . $this->faker->unique()->numerify('#####')),
            'user_id' => $user->id,
            'name' => $user->first_name . ' ' . $user->last_name,
            'age' => $this->faker->numberBetween(18, 25),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'course_id' => $course->id,
            'year_level' => $this->faker->randomElement(['1st Year', '2nd Year', '3rd Year', '4th Year']),
        ];
    }
}
