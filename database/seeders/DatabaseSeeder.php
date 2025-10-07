<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Llamar a los seeders en orden correcto
        // IMPORTANTE: CategorySeeder PRIMERO porque Books depende de Categories
        $this->call([
            CategorySeeder::class, // Primero crear categorías
            BookSeeder::class,     // Luego crear libros (que usan category_id)
        ]);
    }
}
