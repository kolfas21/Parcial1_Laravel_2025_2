<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_book';
    public $timestamps = false;

    protected $fillable = [
        'book_name',
        'book_author_name',
        'book_price',
        'book_stock',
        'book_status',
        'category_id',
        'barcode',
    ];

    protected $casts = [
        'book_price' => 'double',
        'book_status' => 'boolean',
    ];

    /**
     * Relación: Un libro pertenece a una categoría (N:1)
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id_category');
    }
}
