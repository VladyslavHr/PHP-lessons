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

Route::middleware('auth')->group(function () {

    Route::post('posts/reloadPosts', [App\Http\Controllers\PostController::class, 'reloadPosts'])->name('posts.reloadPosts');

    Route::controller(App\Http\Controllers\ProfileController::class)->group(function () {
        Route::get('/', 'profile')->name('main');
        Route::get('/friends', 'friends')->name('profiles.friends');
        Route::get('/profile', 'profile')->name('profile');
        Route::get('/profile/{user}', 'show')->name('profiles.show');
        Route::get('/profiles/edit', 'edit')->name('profiles.edit');
        Route::get('/profiles/search', 'search')->name('profiles.search');
        Route::get('/profiles/shop', 'shop')->name('profiles.shop');
        Route::get('/profiles/product', 'product')->name('profiles.product');
        Route::get('/profiles/productCreate', 'productCreate')->name('profiles.productCreate');
        Route::get('/profiles/following', 'following')->name('profiles.following');
        Route::get('/profiles/followers', 'followers')->name('profiles.followers');
        Route::post('/profiles/follow', 'follow')->name('profiles.follow');
        Route::post('/profiles/unfollow', 'unfollow')->name('profiles.unfollow');
        Route::post('/profiles/update', 'update')->name('profiles.update');
        Route::post('/profiles/updatePassword', 'updatePassword')->name('profiles.updatePassword');
        Route::post('/profile/uploadAvatar', 'uploadAvatar')->name('profile.uploadAvatar');
        Route::delete('/profile/{user}', 'destroy')->name('profile.delete');
    });


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');

    Route::get('/albums', [App\Http\Controllers\AlbumController::class, 'index'])->name('albums.index');



    Route::post('groups/uploadAvatar', [App\Http\Controllers\GroupController::class, 'uploadAvatar'])->name('groups.uploadAvatar');
    Route::get('/groups/search', [App\Http\Controllers\GroupController::class, 'search'])->name('groups.search');
    Route::get('/groups/subscribedGroups', [App\Http\Controllers\GroupController::class, 'subscribedGroups'])->name('groups.subscribedGroups');
    Route::post('groups/subscribe', [App\Http\Controllers\GroupController::class, 'subscribe'])->name('groups.subscribe');
    Route::resource('groups', App\Http\Controllers\GroupController::class);

    Route::resource('posts', App\Http\Controllers\PostController::class);

    Route::resource('comments', App\Http\Controllers\CommentController::class);

    Route::resource('products', App\Http\Controllers\ProductController::class);

});
