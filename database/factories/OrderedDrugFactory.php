<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderedDrug>
 */
class OrderedDrugFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'OrderedQty' => fake()->randomFloat(), 
            'BatchNo' => fake()->word(), 
            'price' => fake()->randomFloat(), 
            'orders_id' => fake()->randomDigitNotZero(1,15)
        ];
    }
}
