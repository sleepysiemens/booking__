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


//==========MAIN==========
Route::get('/', 'App\Http\Controllers\MainController@index')->name('main.index');
Route::get('/tariff', 'App\Http\Controllers\MainController@tariff')->name('tariff.index');
Route::get('/help', 'App\Http\Controllers\MainController@help')->name('help.index');
Route::post('/search', 'App\Http\Controllers\SearchController@search')->name('search.index');



Route::group(['middleware' => ['auth'], ], function (){
    //==========PROFILE==========
    Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile.index');
    Route::patch('/profile/{user}', 'App\Http\Controllers\ProfileController@update')->name('profile.update');
    Route::get('/profile/logout', 'App\Http\Controllers\ProfileController@logout')->name('profile.logout');

    //==========PAY==========
    Route::post('/pay', 'App\Http\Controllers\BookingController@pay_page_post')->name('pay.post.index');
    //Route::get('/pay', 'App\Http\Controllers\BookingController@pay_page_get')->name('pay.get.index');

    Route::get('/payment-confirm', 'App\Http\Controllers\PayController@index')->name('payment.index');
    Route::post('/payment-confirm/confirm', 'App\Http\Controllers\PayController@confirm')->name('payment.confirm');

    //==========WAIT==========
    Route::get('/wait/', 'App\Http\Controllers\WaitController@index')->name('wait.index');

    //==========ORDER==========
    Route::get('/order/{order}', 'App\Http\Controllers\OrderController@index')->name('order.index');

    //==========TICKET==========
    Route::get('/ticket/{order}', 'App\Http\Controllers\TicketController@index')->name('ticket.index');

});

//==========BLOG==========
Route::get('/blog', 'App\Http\Controllers\BlogController@index')->name('blog.index');
Route::get('/blog/post/{post}', 'App\Http\Controllers\BlogController@show')->name('blog.show');


//==========REVIEWS==========
Route::get('/reviews', 'App\Http\Controllers\ReviewController@index')->name('reviews.index');
Route::post('/reviews', 'App\Http\Controllers\ReviewController@store')->name('reviews.store');


//==========BOOKING==========
Route::post('/booking', 'App\Http\Controllers\BookingController@index')->name('booking.index');


//==========ADMIN==========
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

    Route::get('/orders', 'App\Http\Controllers\Admin\OrdersController@index')->name('admin.orders.index');
    Route::get('/orders/{order}/edit', 'App\Http\Controllers\Admin\OrdersController@edit')->name('admin.orders.edit');
    Route::patch('/orders/{order}', 'App\Http\Controllers\Admin\OrdersController@update')->name('admin.orders.update');
    Route::delete('/orders/{order}', 'App\Http\Controllers\Admin\OrdersController@delete')->name('admin.orders.delete');

    Route::get('/users', 'App\Http\Controllers\Admin\UsersController@index')->name('admin.users.index');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//By sleepy_siemens 2024 Jan
//2001sema@gmail.com
//TG: @sleepysiemens
