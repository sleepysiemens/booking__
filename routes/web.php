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
Route::get('/profile', 'App\Http\Controllers\MainController@profile')->name('profile.index');
Route::get('/tariff', 'App\Http\Controllers\MainController@tariff')->name('tariff.index');
Route::get('/help', 'App\Http\Controllers\MainController@help')->name('help.index');
Route::get('/wait/{stage}', 'App\Http\Controllers\MainController@wait')->name('wait.index');
Route::get('/ticket', 'App\Http\Controllers\MainController@ticket')->name('ticket.index');
Route::post('/search', 'App\Http\Controllers\SearchController@search')->name('search.index');

Route::get('/blog/{page}', 'App\Http\Controllers\BlogController@index')->name('blog.index');
Route::get('/blog/post/{blog}', 'App\Http\Controllers\BlogController@show')->name('blog.show');

Route::get('/reviews', 'App\Http\Controllers\ReviewController@index')->name('reviews.index');
Route::post('/reviews', 'App\Http\Controllers\ReviewController@store')->name('reviews.store');
//Route::get('/test', 'App\Http\Controllers\TestController@test')->name('test.index');
