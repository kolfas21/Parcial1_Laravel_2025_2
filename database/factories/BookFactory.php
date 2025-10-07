<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_name' => fake()->sentence(3),
            'book_author_name' => fake()->name(),
            'book_price' => fake()->randomFloat(2, 9.99, 999.99),
            'book_stock' => fake()->numberBetween(0, 100),
            'book_status' => fake()->boolean(80), // 80% chance of being active
            // Asigna un category_id aleatorio de las categorías existentes
            'category_id' => Category::inRandomOrder()->first()?->id_category ?? null,
            'barcode' => fake()->ean13(), // Genera código de barras tipo EAN-13
        ];
    }
}
