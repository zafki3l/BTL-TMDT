<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'productName' => $this->faker->name(),
            'description' => $this->faker->sentence(50),
            'price' => $this->faker->numberBetween(10000, 100000),
            'status' => $this->faker->randomElement([0, 1]),
            'amount' => $this->faker->numberBetween(0, 50)
        ];
    }
}
