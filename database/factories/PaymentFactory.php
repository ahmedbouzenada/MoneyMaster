<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
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
            'payment_method' => $this->faker->randomElement(['cash', 'credit_card', 'bank_transfer']),
            'reference_number' => $this->faker->unique()->uuid,
        ];
    }
}
