<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fname' => fake()->firstName(), 
            'lname' => fake()->lastName(), 
            'phone' => fake()->phoneNumber(), 
            'gender' => fake()->randomElement(['male','female']), 
            'address' => fake()->streetAddress(), 
            'ssn' => fake()->word(), 
            'dob' => fake()->date(), 
            'insurances_id' => fake()->randomDigitNotZero(1,15)
        ];
    }
}
