<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SerialNumbersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});





Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    // Route::get('/vendor/voyager/serial-numbers','SerialNumbersController@create');
    Route::get('serial-numbers', [SerialNumbersController::class, 'create']);
    Route::post('serial-numbers', [SerialNumbersController::class, 'store'])->name('serial-numbers.store');

});
