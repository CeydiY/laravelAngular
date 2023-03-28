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
            'user_id' =>rand(1,10),
            'firstName' => $this->faker->text(),
            'lastName'=> $this->faker->text(),
            'name' => $this->faker->text(),
            'age' => rand(18,66),
            'address' => $this->faker->text(),
            'gender' => $this->faker->text(),
            'country' => $this->faker->text(),
            'birthdate' => $this->faker->text(),
        ];
    }
}
