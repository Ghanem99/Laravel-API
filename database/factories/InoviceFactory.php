<?php

namespace Database\Factories;

use app\Models\Customer;
use app\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inovice>
 */
class InoviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['B', 'P', 'V']);

        return [
            'customer_id' => Customer::factory(), 
            'amount' => $this->faker->numberBetween(100, 2000), 
            'status' => $status, 
            'billed_date' => $this->faker->dateTimeThisDecade(),
            'paid_date' => $status == 'P' ? $this->faker->dateTimeThisDecade() : Null
        ];
    }
}
