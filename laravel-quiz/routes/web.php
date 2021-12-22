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

Route::get('/category', [App\Http\Controllers\PharmacyController::class, 'category'])->name('category');

Route::get('/product', [App\Http\Controllers\PharmacyController::class, 'product'])->name('product');
