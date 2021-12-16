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

Route::get('/welcome-test', function () {
    return view('welcome-test');
});

Route::get('/welcome-test2', function () {
    return view('welcome-test2');
});

// Route::get('/zoho-auth', [App\Http\Controllers\ZohoController::class, 'get_token']);

// Route::get('/profile', function ($username) {
//     $users = User::all();
//     return view('profile', [
//         'title' => 'My profile',
//         'user' => '$user',
//         'users' => $users,
//         'user' =>
//     ]);
// });

// Route::get('/groups', function () {
//     return view('groups',[
//         'title' => 'groups',
//     ]);
// });


// Route::get('/friends', function () {
//     $users = \App\Models\User::all();
//     return view('friends', [
//         'title' => 'friends',
//         'users' => $users,
//     ]);
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/friends', [App\Http\Controllers\HomeController::class, 'friends'])->name('friends');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/groups', [App\Http\Controllers\HomeController::class, 'groups'])->name('groups');
