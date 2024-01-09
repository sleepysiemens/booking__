<?php

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
//

Route::get('/', 'App\Http\Controllers\MainController@index')->name('main.index');
Route::get('/booking', 'App\Http\Controllers\MainController@booking')->name('booking.index');
Route::get('/search', 'App\Http\Controllers\MainController@search')->name('search.index');
Route::get('/profile', 'App\Http\Controllers\MainController@profile')->name('profile.index');
