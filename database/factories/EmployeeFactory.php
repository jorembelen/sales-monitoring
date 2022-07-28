<?php

namespace Database\Factories;

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
    public function definition()
    {
        $name = $this->faker->unique()->words($nb=2,$asText=true);

        return [
            'name' => $name,
            'designation' => $this->faker->randomElement(['Doctor','Receptionist', 'Aesthetician', 'Nurse', 'Supervisor', 'Utility', 'Nurse', 'Marketing', 'Artist']),
        ];
    }
}
