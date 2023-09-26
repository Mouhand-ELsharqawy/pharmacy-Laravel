<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'medtype' => fake()->word(), 
            'manufacturer' => fake()->company(), 
            'stockqty' => fake()->word(), 
            'price' => fake()->randomFloat(), 
            'expiredate' => fake()->date(), 
            'desc' => fake()->sentence(3), 
            'ordered_drugs_id' => fake()->randomDigitNotZero(1,15)
        ];
    }
}
