<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Book;
use App\Models\Category;

echo "=== VERIFICACIÓN DE SEEDERS ===\n\n";

// Contar categorías
$categoriesCount = Category::count();
echo "✅ Categorías creadas: {$categoriesCount}\n";

// Contar libros
$booksCount = Book::count();
echo "✅ Libros creados: {$booksCount}\n\n";

// Mostrar algunas categorías
echo "=== CATEGORÍAS DE EJEMPLO ===\n";
Category::take(3)->get()->each(function($category) {
    echo "- ID: {$category->id_category} | {$category->category_name}\n";
});

echo "\n=== LIBROS CON CATEGORÍAS ASIGNADAS ===\n";
// Mostrar algunos libros con sus categorías
Book::with('category')->take(5)->get()->each(function($book) {
    $categoryName = $book->category ? $book->category->category_name : 'Sin categoría';
    echo "- {$book->book_name} | Categoría: {$categoryName} | Barcode: {$book->barcode}\n";
});

echo "\n=== ESTADÍSTICAS ===\n";
$booksWithCategory = Book::whereNotNull('category_id')->count();
$booksWithoutCategory = Book::whereNull('category_id')->count();
echo "Libros CON categoría: {$booksWithCategory}\n";
echo "Libros SIN categoría: {$booksWithoutCategory}\n";
