<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'name' => fake()->firstName(), 
        'species' => fake()->randomElement(['Perro', 'Gato', 'Hamster', 'Ave']),
        'breed' => fake()->word(),
        'age' => fake()->numberBetween(1, 15), 
    ];
}
}
