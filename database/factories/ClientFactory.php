<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
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
            'email' =>  $this->faker->unique()->safeEmail,
            'address' => $this->faker->text(20),
            'contact' => $this->faker->phoneNumber,
            'dob' => $this->faker->dateTimeBetween($startDate = '-70 years', $endDate = '-20', $timezone = null),
        ];
    }
}
