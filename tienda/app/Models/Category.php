<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_description',
        'category_rating',
        'category_status',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'fk_category_product');
    }
}
