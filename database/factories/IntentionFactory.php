<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Intention>
 */
class IntentionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'intention' => fake()->paragraph(),
            'intention_for' => fake()->name(),
            'start_date' => fake()->date(),
            'end_date' => fake()->date(),
            'sunday_mass' => fake()->date(),
            'weekday_mass' => fake()->dayOfWeek(),
        ];
    }
}
