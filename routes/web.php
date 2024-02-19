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

Route::group(['middleware' => 'locale' ], function (){

    //==========MAIN==========
    Route::get('/', 'App\Http\Controllers\MainController@index')->name('main.index');
    Route::get('/ref/{ref_link}', 'App\Http\Controllers\MainController@ref')->name('main.ref');
    Route::get('/tariff', 'App\Http\Controllers\MainController@tariff')->name('tariff.index');
    Route::get('/help', 'App\Http\Controllers\MainController@help')->name('help.index');

    //==========SEARCH==========
    Route::get('/search', 'App\Http\Controllers\SearchController@search_get')->name('search.get');
    Route::post('/search', 'App\Http\Controllers\SearchController@search')->name('search.index');



        //==========CONFIRM CHECK==========
    Route::get('/pnrcheck', 'App\Http\Controllers\ConfirmTicketController@index')->name('pnrcheck.index');
    Route::post('/pnrcheck', 'App\Http\Controllers\ConfirmTicketController@check')->name('pnrcheck.check');


    Route::get('/qr-code', 'App\Http\Controllers\QRCodeController@index')->name('qr-code');



    Route::group(['middleware' => ['auth'], ], function (){
        //==========PROFILE==========
        Route::group(['prefix' => 'profile', ], function (){
            Route::get('/', 'App\Http\Controllers\ProfileController@index')->name('profile.index');
            Route::patch('/update/{user}', 'App\Http\Controllers\ProfileController@update')->name('profile.update');

            Route::get('/orders', 'App\Http\Controllers\ProfileController@orders')->name('profile.orders');
            Route::get('/passengers', 'App\Http\Controllers\ProfileController@passengers')->name('profile.passengers');
            Route::get('/new_passenger', 'App\Http\Controllers\ProfileController@new_passenger')->name('profile.new_passenger');

            Route::put('/add_passenger', 'App\Http\Controllers\ProfileController@add_passenger')->name('profile.add_passenger');
            Route::get('/logout', 'App\Http\Controllers\ProfileController@logout')->name('profile.logout');

            //==========PARTNERSHIP==========
            Route::group(['prefix' => 'partnership', ], function (){
                Route::get('/', 'App\Http\Controllers\PartnershipController@index')->name('partnership.index');
                Route::get('/become-a-partner', 'App\Http\Controllers\PartnershipController@become_partner')->name('partnership.become_partner');
                Route::post('/become-a-partner/form', 'App\Http\Controllers\PartnershipController@form')->name('partnership.form');

                Route::get('/withdraw', 'App\Http\Controllers\PartnershipController@withdraw')->name('partnership.withdraw');
                Route::post('/withdraw-send', 'App\Http\Controllers\PartnershipController@withdraw_send')->name('partnership.withdraw.send');
            });

        });

        //==========PAY==========
        Route::post('/payment-confirm', 'App\Http\Controllers\PayController@index')->name('payment.index');
        Route::get('/successful-payment', 'App\Http\Controllers\PayController@confirm')->name('payment.confirm');
        Route::get('/failed-payment', 'App\Http\Controllers\PayController@fail')->name('payment.failed');

        //==========WAIT==========
        Route::get('/wait/', 'App\Http\Controllers\WaitController@index')->name('wait.index');

        //==========ORDER==========
        Route::get('/order/{order}', 'App\Http\Controllers\OrderController@index')->name('order.index');

        //==========TICKET==========
        Route::get('/ticket/{order}', 'App\Http\Controllers\TicketController@index')->name('ticket.index');
        Route::get('/ticket/{order}/download', 'App\Http\Controllers\TicketController@download')->name('ticket.download');
    });

    Route::get('/locale/{lang}', 'App\Http\Controllers\ChangeLocaleController@change_locale')->name('locale.change');

//==========BLOG==========
    Route::get('/blog', 'App\Http\Controllers\BlogController@index')->name('blog.index');
    Route::get('/blog/post/{post}', 'App\Http\Controllers\BlogController@show')->name('blog.show');


//==========REVIEWS==========
    Route::get('/reviews', 'App\Http\Controllers\ReviewController@index')->name('reviews.index');
    Route::post('/reviews', 'App\Http\Controllers\ReviewController@store')->name('reviews.store');


//==========BOOKING==========
    Route::post('/booking', 'App\Http\Controllers\BookingController@index')->name('booking.index');
    Route::get('/booking', 'App\Http\Controllers\BookingController@get')->name('booking.get');

    Route::post('/pay', 'App\Http\Controllers\BookingController@pay_page_post')->name('pay.post.index');
    Route::get('/pay', 'App\Http\Controllers\BookingController@pay_page_get')->name('pay.get.index');
});

//==========ADMIN==========
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], ], function ()
{
    //==========MAIN==========
    Route::get('/', 'App\Http\Controllers\Admin\MainController@index')->name('admin.index');
    Route::patch('/save_price', 'App\Http\Controllers\Admin\MainController@save_price')->name('admin.save_price');

    //==========REVIEWS==========
    Route::group(['prefix' => 'reviews',], function (){
        Route::get('/', 'App\Http\Controllers\Admin\ReviewController@index')->name('admin.reviews.index');
        Route::get('/{review}/edit', 'App\Http\Controllers\Admin\ReviewController@edit')->name('admin.reviews.edit');
        Route::patch('/{review}', 'App\Http\Controllers\Admin\ReviewController@update')->name('admin.reviews.update');
        Route::delete('/{review}', 'App\Http\Controllers\Admin\ReviewController@delete')->name('admin.reviews.delete');
    });

    //==========BLOG==========
    Route::group(['prefix' => 'blog',], function (){
        Route::get('/', 'App\Http\Controllers\Admin\BlogController@index')->name('admin.blog.index');
        Route::get('/create', 'App\Http\Controllers\Admin\BlogController@create')->name('admin.blog.create');
        Route::post('/', 'App\Http\Controllers\Admin\BlogController@store')->name('admin.blog.store');
        Route::get('/{post}/edit', 'App\Http\Controllers\Admin\BlogController@edit')->name('admin.blog.edit');
        Route::patch('/{post}', 'App\Http\Controllers\Admin\BlogController@update')->name('admin.blog.update');
    });

    //==========BOOKING_ORDERS==========
    Route::group(['prefix' => 'orders',], function (){
        Route::get('/', 'App\Http\Controllers\Admin\OrdersController@index')->name('admin.orders.index');
        Route::get('/{order}/edit', 'App\Http\Controllers\Admin\OrdersController@edit')->name('admin.orders.edit');
        Route::patch('/{order}', 'App\Http\Controllers\Admin\OrdersController@update')->name('admin.orders.update');
        Route::delete('/{order}', 'App\Http\Controllers\Admin\OrdersController@delete')->name('admin.orders.delete');
    });

    //==========PARTNERS==========
    Route::group(['prefix' => 'partners',], function (){
        Route::get('/', 'App\Http\Controllers\Admin\PartnersController@index')->name('admin.partners.index');
        Route::get('/accept-application/{application}', 'App\Http\Controllers\Admin\PartnersController@accept_application')->name('admin.partners.accept_application');
            Route::get('/accept-withdraw/{withdraw}', 'App\Http\Controllers\Admin\PartnersController@accept_withdraw')->name('admin.partners.accept_withdraw');
    });

    //==========USERS==========
    Route::get('/users', 'App\Http\Controllers\Admin\UsersController@index')->name('admin.users.index');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//By sleepy_siemens 2024 Jan
//2001sema@gmail.com
//TG: @sleepysiemens
