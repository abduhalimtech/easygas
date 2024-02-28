<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'title',
        'description',
    ];

    public function cars()
    {
        return $this->belongsToMany(Car::class, 'car_products');
    }
}
