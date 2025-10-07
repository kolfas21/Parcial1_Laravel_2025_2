<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // Agregar llave foránea de categoría (SIN valor por defecto)
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id_category')->on('categories')->onDelete('set null');
            
            // Agregar columna de código de barras (SIN valor por defecto)
            $table->string('barcode')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // Eliminar llave foránea y columnas
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            $table->dropColumn('barcode');
        });
    }
};
