<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();
Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {

    Route::get('/', [App\Http\Controllers\PharmacyController::class, 'index'])->name('pharmacies.index');

    Route::get('/pharmacies/{pharmacy}', [App\Http\Controllers\PharmacyController::class, 'show'])->name('pharmacies.show');

    Route::get('/pharmacies/{pharmacy}/categories/{category}', [App\Http\Controllers\CategoryController::class, 'show'])
        ->name('pharmacies.categories.show');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');

    Route::post('/categories/estimate', [App\Http\Controllers\CategoryController::class, 'estimate'])->name('category.estimate');

    Route::post('/pharmacies/estimate_category', [App\Http\Controllers\PharmacyController::class, 'estimate_category'])->name('pharmacies.estimate_category');

    Route::post('/pharmacies/load_images', [App\Http\Controllers\PharmacyController::class, 'load_images'])->name('pharmacies.load_images');

    Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');

    Route::get('/statistics/products', [App\Http\Controllers\StatisticController::class, 'products'])->name('statistics.products');

    Route::get('/statistics/categories', [App\Http\Controllers\StatisticController::class, 'categories'])->name('statistics.categories');

    Route::get('/excel-cat', [App\Http\Controllers\PharmacyController::class, 'read_excel_category'])->name('read_excel_category');

    Route::get('/excel-prod', [App\Http\Controllers\PharmacyController::class, 'read_excel_products'])->name('read_excel_products');

});
