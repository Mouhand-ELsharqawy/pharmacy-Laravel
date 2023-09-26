<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bill>
 */
class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ssn' => fake()->word(), 
            'insrpay' => fake()->randomFloat(), 
            'custpay' => fake()->randomFloat(), 
            'totalamount' => fake()->randomFloat(), 
            'customers_id' => fake()->randomDigitNotZero(1,15)
        ];
    }
}
