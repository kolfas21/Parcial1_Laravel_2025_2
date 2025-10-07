<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_category';
    public $timestamps = false;

    protected $fillable = [
        'category_name',
        'category_description',
        'category_priority',
        'category_status',
    ];

    protected $casts = [
        'category_status' => 'boolean',
    ];

    /**
     * Relación: Una categoría tiene muchos libros (1:N)
     */
    public function books()
    {
        return $this->hasMany(Book::class, 'category_id', 'id_category');
    }
}
