<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Http\Resources\NamesoOfCarResource;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function allCars()
    {
        $items = Car::all();
        return CarResource::collection($items);
    }
    public function carsByBrand($id)
    {
        $items = Car::where('brand_id', $id)->get();
        return CarResource::collection($items);
    }
}
