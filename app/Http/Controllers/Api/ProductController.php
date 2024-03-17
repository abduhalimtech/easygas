<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Car;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $items = Product::all();
        return ProductResource::collection($items);
    }

    public function categoriesByCar($carId)
    {
        $car = Car::findOrFail($carId);
        $categories = $car->products()->with('categories')->get()->pluck('categories')->unique('id');
        return ProductCategoryResource::collection($categories);
    }

    public function productsByCar($carId) // Renamed from productsByCategory
    {
        $car = Car::findOrFail($carId);
        $items = $car->products;
        return ProductResource::collection($items);
    }

    public function productsByCarAndCategory($carId, $categoryId) // Renamed from byCarAndCategory
    {
        $car = Car::findOrFail($carId);
        $products = $car->products()->where('product_category_id', $categoryId)->get();
        return ProductResource::collection($products);
    }

    public function show($productId)
    {
        $product = Product::with(['categories', 'cars'])->findOrFail($productId);
        return new ProductResource($product);
    }
}
