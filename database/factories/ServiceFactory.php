<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product_name = $this->faker->unique()->words($nb=2,$asText=true);

        return [
            'name' => $product_name,
            'price' => $this->faker->numberBetween(500, 15000),
            'status' => $this->faker->randomElement([1,2]),
        ];
    }
}
