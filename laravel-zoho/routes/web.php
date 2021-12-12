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

// Route::get('/profile/{username}', function ($username) {
//     return view('profile', [
//         'username' => $username,
//         'title' => 'Hello World',
//         'menu_btn_bg' => 'darkblue',
//         'show_profile_menu' => true,
//         'user' => '$user',
//     ]);
// });

// Route::get('/groups', function () {
//     return view('groups',[
//         'title' => 'groups',
//     ]);
// });


// Route::get('/friends', function () {
//     $users = \App\Models\User::all();
//     // dd($users);
//     return view('friends', [
//         'title' => 'friends',
//         'users' => $users,
//     ]);
// });
