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
    public function definition(): array
    {
        return [
            'fname' => fake()->firstName(), 
            'lname' => fake()->lastName(), 
            'dob' => fake()->date(), 
            'salary' => fake()->randomFloat(), 
            'startdate' => fake()->date(), 
            'enddate' => fake()->date(), 
            'role' => fake()->word(), 
            'liscense' => fake()->word(), 
            'ssn' => fake()->word(), 
            'phone' => fake()->phoneNumber(), 
            'orders_id' => fake()->randomDigitNotZero(1,15)
        ];
    }
}
