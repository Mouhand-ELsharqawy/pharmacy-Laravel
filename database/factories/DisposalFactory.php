<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Disposal>
 */
class DisposalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dispqty' => fake()->word(), 
            'company' => fake()->company(), 
            'dispdate' => fake()->date(), 
            'medicines_id' => fake()->randomDigitNotZero(1,15), 
            'employees_id' => fake()->randomDigitNotZero(1,15)
        ];
    }
}
