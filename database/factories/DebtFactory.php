<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Debt>
 */
class DebtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $clientIds = Client::pluck('id')->toArray();
        return [
            'amount' => $this->faker->randomFloat(2, 1000, 10000),
            'description' => $this->faker->sentence,
            'date' => $this->faker->dateTimeBetween('-2 years'),
            'client_id' => $this->faker->randomElement($clientIds),
            'reference_number' => $this->faker->unique()->uuid,
        ];
    }
}
