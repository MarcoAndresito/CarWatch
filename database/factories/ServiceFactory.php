<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Lavado',
                'Enceraddo',
                'Cambio de aceite',
                'Pulido',
                'Aspirado',
                'Lavado interior',
                'Lavado de motor',
            ]),
            'description' => $this->faker->text(50),
            'price' => $this->faker->numberBetween(10, 50),
            'offer' => $this->faker->boolean(),
            'discount' => $this->faker->numberBetween(1, 9),
            'disable' => $this->faker->boolean(),
        ];
    }
}
