<?php

namespace Database\Factories;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'age' => $this->faker->numberBetween(18, 25), // Age between 18 and 25
            'gender' => $this->faker->randomElement(['Male', 'Female', 'Other']), // Gender
           'course_id' => Course::inRandomOrder()->first()->id ?? Course::factory()->create()->id,


            'year_level' => $this->faker->randomElement(['1st Year', '2nd Year', '3rd Year', '4th Year']), // Random year level
          
        ];
    }
}
