<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PrescriptionDrug>
 */
class PrescriptionDrugFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'drugname' => fake()->word(),  
            'refilllimit' => fake()->date(), 
            'prescriptions_id' => fake()->randomDigitNotZero(1,15)
        ];
    }
}
