<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_description',
        'product_price',
        'product_stock',
        'product_status',
        'fk_category_product',
    ];

    protected $casts = [
        'product_price' => 'decimal:2', // Para manejar decimales correctamente
        'product_stock' => 'integer',   // Asegura que sea entero
        'product_status' => 'boolean',  // Convierte automáticamente a booleano
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'fk_category_product');
    }
}
