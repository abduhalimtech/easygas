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

    // cars
    Route::get('/cars', [CarController::class, 'index']);
    Route::get('/brands/{brandId}/cars', [CarController::class, 'byBrand']);

    // brands
    Route::get('/brands', [BrandController::class, 'index']);

    // regions
    Route::get('/regions', [RegionController::class, 'index']);

    // authentication
    Route::post('/auth/login-register', [AuthController::class, 'loginOrRegister']);


    Route::middleware(['auth:sanctum'])->group(function () {
        //clients
        Route::get('/client', [AuthController::class, 'getClient']);

        // news
        Route::get('/news', [NewsController::class, 'index']);

        // products
        Route::get('/products', [ProductController::class, 'index']);
        Route::get('/cars/{carId}/product-categories', [ProductController::class, 'categoriesByCar']);
        Route::get('/cars/{carId}/products', [ProductController::class, 'productsByCar']);
        Route::get('/cars/{carId}/categories/{categoryId}/products', [ProductController::class, 'productsByCarAndCategory']);
        Route::get('/products/{productId}', [ProductController::class, 'show']);

        // branches
        Route::get('/branches', [BranchController::class, 'index']);
        Route::get('/regions/{regionId}/branches', [BranchController::class, 'byRegion']);

    });
});
