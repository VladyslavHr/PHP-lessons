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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/excel', [App\Http\Controllers\PharmacyController::class, 'index'])->name('excel');

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');

Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product');

Route::get('/excel-cat', [App\Http\Controllers\PharmacyController::class, 'read_excel_category'])->name('read_excel_category');

Route::get('/excel-prod', [App\Http\Controllers\PharmacyController::class, 'read_excel_products'])->name('read_excel_products');
