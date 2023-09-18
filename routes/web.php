<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::group(['namespace' => 'App\\Http\\Controllers\\Image\\'], function () {
    Route::get('/image/create', 'CreateController')->name('image.create')->middleware('auth');
    Route::get('/image/{image}', 'IndexController')->name('image.show');
    Route::post('/image', 'StoreController')->name('image.store')->middleware('auth');
    Route::get('/image', 'IndexController')->name('image.index');
    Route::get('/image/{image}/edit', 'EditController')->name('image.edit')->middleware('auth');
    Route::patch('image/{image}', 'UpdateController')->name('image.update')->middleware('auth');
    Route::delete('image/{image}', 'DestroyController')->name('image.delete')->middleware('auth');
});

Route::group(['namespace' => 'App\\Http\\Controllers\\Auth\\'], function()  {
    Route::get('/register', 'RegisterController@create')->name('register')->middleware('guest');
    Route::post('/register', 'RegisterController@store')->name('register.store')->middleware('guest');
    Route::get('/login', 'LoginController@create')->name('login')->middleware('guest');
    Route::post('/login', 'LoginController@store')->name('login')->middleware('guest');
    Route::post('/logout', 'LoginController@destroy')->name('logout')->middleware('auth');
    Route::get('/reset-password', 'ResetPasswordController@update')->name('password.update')->middleware('auth');
    Route::post('/reset-password', 'ResetPasswordController@reset')->name('password.reset')->middleware('auth');
});


Route::get('/user/{user}', 'App\\Http\\Controllers\\UserPageController')->name('userpage')->middleware('auth');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
