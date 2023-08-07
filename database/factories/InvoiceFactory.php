<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inovice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
    $status = $this->faker->randomElement(['b', 'p', 'v']);
    
    return [
        'customer_id' => customer::factory(),
        'amount' => $this->faker->numberBetween(100, 2000),
        'status' => $status,
        'billed_date' => $this->faker->dateTimeThisDecade(),
        'paid_date' => $status == 'p' ? $this->faker->dateTimeThisDecade() : null
    ];
}


}
