<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_category_id',
        'name',
        'image',
        'title',
        'description',
    ];

    public function cars()
    {
        return $this->belongsToMany(Car::class, 'car_products');
    }
    public function categories()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
}
