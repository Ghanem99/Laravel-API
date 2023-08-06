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

        $type = $this->faker->randomElement(['B', 'I']);
        $name = $type == 'I' ? $this->fake->name() : $thi->fake->company();
        return [
            'name' => $name, 
            'type' => $type,
            'email' => $this->faker->email(), 
            'address' => $this->faker->postCode()
        ];
    }
}
