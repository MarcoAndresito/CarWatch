<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'registration' => $this->faker->regexify('[1-5][0-9]{3}[A-Z]{3}'),
            'type' => $this->faker->randomElement(['Motocicleta', 'Automóvil', 'Camioneta']),
            'nit' => $this->faker->regexify('[0-9]{8}[0-0][1-1][1-9]'),
            'name' => $this->faker->name(),
        ];
    }
}
