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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/names/show/{name}', [App\Http\Controllers\NameController::class, 'show'])->name('names.show');
Route::get('/names/result', [App\Http\Controllers\NameController::class, 'result'])->name('names.result');
Route::get('/names/search',[App\Http\Controllers\NameController::class, 'search'])->name('names.search');
