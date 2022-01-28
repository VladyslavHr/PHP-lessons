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

Auth::routes();

Route::middleware('auth')->group(function () {


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');
Route::get('/friends', [App\Http\Controllers\HomeController::class, 'friends'])->name('friends');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
Route::get('/profiles/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profiles.edit');
Route::post('/profile/uploadAvatar', [App\Http\Controllers\ProfileController::class, 'uploadAvatar'])->name('profile.uploadAvatar');

Route::post('groups/uploadAvatar', [App\Http\Controllers\GroupController::class, 'uploadAvatar'])->name('groups.uploadAvatar');;
Route::resource('groups', App\Http\Controllers\GroupController::class);

});
