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
            "client_category_id" => fake()->randomElement([1, 2, 3]),
            "name" => fake()->name(),
            "email" => fake()->email(),
            "nationality" => fake()->country(),
            "city" => fake()->city(),
            "state" => fake()->city(),
            "street" => fake()->streetName(),
            "phone" => fake()->phoneNumber(),
            "active" => 1,
        ];
    }
}
