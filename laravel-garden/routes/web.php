<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/main', [App\Http\Controllers\MainController::class, 'index'])->name('main.index');
    Route::get('/main/show', [App\Http\Controllers\MainController::class, 'show'])->name('main.show');
    Route::get('/seeds', [App\Http\Controllers\SeedsController::class, 'index'])->name('seeds.index');
    Route::get('/seeds/js_test', [App\Http\Controllers\SeedsController::class, 'js_test'])->name('seeds.js_test');




    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');






});


