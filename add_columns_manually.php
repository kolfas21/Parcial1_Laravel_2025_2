<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

echo "Verificando columnas de la tabla books...\n\n";

// Ver columnas actuales
$columns = Schema::getColumnListing('books');
echo "Columnas actuales:\n";
print_r($columns);
echo "\n";

// Verificar si existen category_id y barcode
$hasCategoryId = in_array('category_id', $columns);
$hasBarcode = in_array('barcode', $columns);

echo "¿Tiene category_id? " . ($hasCategoryId ? 'SÍ' : 'NO') . "\n";
echo "¿Tiene barcode? " . ($hasBarcode ? 'SÍ' : 'NO') . "\n\n";

// Agregar columnas si no existen
if (!$hasCategoryId) {
    echo "Agregando category_id...\n";
    DB::statement('ALTER TABLE books ADD COLUMN category_id BIGINT NULL');
    echo "✓ category_id agregada\n";
} else {
    echo "✓ category_id ya existe\n";
}

if (!$hasBarcode) {
    echo "Agregando barcode...\n";
    DB::statement('ALTER TABLE books ADD COLUMN barcode VARCHAR(255) NULL');
    echo "✓ barcode agregada\n";
} else {
    echo "✓ barcode ya existe\n";
}

echo "\nColumnas finales:\n";
print_r(Schema::getColumnListing('books'));
