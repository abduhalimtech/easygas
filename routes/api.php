<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\RegionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::name('api.')->group(function () {

    Route::get('/all-cars', [CarController::class, 'allCars']);
    Route::get('/cars-by-brand/{id}', [CarController::class, 'carsByBrand']);
    Route::get('/all-brands', [BrandController::class, 'allBrands']);
    Route::get('/all-regions', [RegionController::class, 'allRegions']);
    Route::get('/all-products', [ProductController::class, 'allProducts']);
    Route::get('/products-by-car/{id}', [ProductController::class, 'productsByCar']);
    Route::get('/all-branches', [BranchController::class, 'allBranches']);

    Route::post('/loginOrRegister', [AuthController::class, 'loginOrRegister']);


    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/all-news', [NewsController::class, 'allNews']);
        //

    });

});
