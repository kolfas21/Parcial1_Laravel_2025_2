<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_name' => fake()->words(3, true), // Genera 3 palabras como nombre
            'category_description' => fake()->sentence(10), // Genera una descripción de 10 palabras
            'category_priority' => fake()->numberBetween(1, 10), // Prioridad entre 1 y 10
            'category_status' => fake()->boolean(80), // 80% de probabilidad de estar activo
        ];
    }
}
