<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API Resource routes for Books
Route::apiResource('books', BookController::class);

// Ruta personalizada para categorías activas con sus libros
// IMPORTANTE: Debe ir ANTES del apiResource para que no sea interceptada
Route::get('/categories/active/with-books', [CategoryController::class, 'activeWithBooks']);

// API Resource routes for Categories
Route::apiResource('categories', CategoryController::class);
