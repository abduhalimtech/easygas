<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Car;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function allProducts()
    {
        $items = Product::all();
        return ProductResource::collection($items);
    }
    public function productsByCar($id)
    {
        $car = Car::findOrFail($id);
        $items = $car->products;
        return ProductResource::collection($items);
    }
}
