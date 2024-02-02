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
Route::get('/blog/post/{post}', 'App\Http\Controllers\BlogController@show')->name('blog.show');

Route::get('/reviews', 'App\Http\Controllers\ReviewController@index')->name('reviews.index');
Route::post('/reviews', 'App\Http\Controllers\ReviewController@store')->name('reviews.store');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], ], function ()
{
    Route::get('/', 'App\Http\Controllers\Admin\MainController@index')->name('admin.index');

    Route::get('/reviews', 'App\Http\Controllers\Admin\ReviewController@index')->name('admin.reviews.index');
    Route::get('/reviews/{review}/edit', 'App\Http\Controllers\Admin\ReviewController@edit')->name('admin.reviews.edit');
    Route::patch('/reviews/{review}', 'App\Http\Controllers\Admin\ReviewController@update')->name('admin.reviews.update');
    Route::delete('/reviews/{review}', 'App\Http\Controllers\Admin\ReviewController@delete')->name('admin.reviews.delete');

    Route::get('/blog', 'App\Http\Controllers\Admin\BlogController@index')->name('admin.blog.index');
    Route::get('/blog/create', 'App\Http\Controllers\Admin\BlogController@create')->name('admin.blog.create');
    Route::post('/blog', 'App\Http\Controllers\Admin\BlogController@store')->name('admin.blog.store');
    Route::get('/blog/{post}/edit', 'App\Http\Controllers\Admin\BlogController@edit')->name('admin.blog.edit');
    Route::patch('/blog/{post}', 'App\Http\Controllers\Admin\BlogController@update')->name('admin.blog.update');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test-html', function (){return view('Layouts.login');});
