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
    public function definition(): array
    {
        return [
            'user_id' =>rand(1,20),
            'firstName' => $this->faker->firstName(),
            'lastName'=> $this->faker->lastName(),
            'name' => $this->faker->name(),
            'age' => rand(18,66),
            'address' => $this->faker->address(),
            'gender' => $this->faker->text(maxNbChars: 5),
            'country' => $this->faker->country(),
            'birthdate' => $this->faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
        ];
    }
}
