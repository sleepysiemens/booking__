<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ConfirmTicketController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PartnershipController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\WaitController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ChangeLocaleController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\PartnersController;
use App\Http\Controllers\Admin\SalesController;
use App\Http\Controllers\Admin\UsersController;

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
    Route::get('/', [MainController::class, 'index'])->name('main.index');
    Route::get('/ref/{ref_link}', [MainController::class, 'ref'])->name('main.ref');
    Route::get('/tariff', [MainController::class, 'tariff'])->name('tariff.index');
    Route::get('/example', [ExampleController::class, 'index'])->name('example.index');
    Route::get('/help', [MainController::class, 'help'])->name('help.index');
    Route::get('/policy', [PolicyController::class, 'index'])->name('policy.index');

    //==========SEARCH==========
    Route::get('/search/{cacheKey}', [SearchController::class, 'search_get'])->name('search.get');
    Route::post('/search', [SearchController::class, 'search'])->name('search.index');

    //==========CONFIRM CHECK==========
    Route::get('/pnrcheck', [ConfirmTicketController::class, 'index'])->name('pnrcheck.index');
    Route::post('/pnrcheck', [ConfirmTicketController::class, 'check'])->name('pnrcheck.check');

    Route::get('/qr-code', [QRCodeController::class, 'index'])->name('qr-code');

    Route::group(['middleware' => ['auth']], function (){
        //==========PROFILE==========
        Route::group(['prefix' => 'profile', ], function (){
            Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
            Route::patch('/update/{user}', [ProfileController::class, 'update'])->name('profile.update');

            Route::get('/orders', [ProfileController::class, 'orders'])->name('profile.orders');
            Route::get('/passengers', [ProfileController::class, 'passengers'])->name('profile.passengers');
            Route::get('/new_passenger', [ProfileController::class, 'new_passenger'])->name('profile.new_passenger');

            Route::put('/add_passenger', [ProfileController::class, 'add_passenger'])->name('profile.add_passenger');
            Route::get('/logout', [ProfileController::class, 'logout'])->name('profile.logout');

            //==========PARTNERSHIP==========
            Route::group(['prefix' => 'partnership'], function (){
                Route::get('/', [PartnershipController::class, 'index'])->name('partnership.index');
                Route::get('/become-a-partner', [PartnershipController::class, 'become_partner'])->name('partnership.become_partner');
                Route::post('/become-a-partner/form', [PartnershipController::class, 'form'])->name('partnership.form');

                Route::get('/withdraw', [PartnershipController::class, 'withdraw'])->name('partnership.withdraw');
                Route::post('/withdraw-send', [PartnershipController::class, 'withdraw_send'])->name('partnership.withdraw.send');
            });

        });

        //==========PAY==========
        Route::post('/payment-confirm', [PayController::class, 'index'])->name('payment.index');
        Route::get('/successful-payment', [PayController::class, 'confirm'])->name('payment.confirm');
        Route::get('/failed-payment', [PayController::class, 'fail'])->name('payment.failed');

        //==========WAIT==========
        Route::get('/wait/', [WaitController::class, 'index'])->name('wait.index');

        //==========ORDER==========
        Route::get('/order/{order}', [OrderController::class, 'index'])->name('order.index');

        //==========TICKET==========
        Route::get('/ticket/{order}', [TicketController::class, 'index'])->name('ticket.index');
        Route::get('/ticket/{order}/download', [TicketController::class, 'download'])->name('ticket.download');
        Route::get('/ticket/{order}-{user}', [TicketController::class, 'index'])->name('ticket.user.index');
        Route::get('/ticket/{order}-{user}/download', [TicketController::class, 'download'])->name('ticket.user.download');
    });

    Route::get('/locale/{lang}', [ChangeLocaleController::class, 'change_locale'])->name('locale.change');

//==========BLOG==========
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/post/{post}', [BlogController::class, 'show'])->name('blog.show');


//==========REVIEWS==========
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');


//==========BOOKING==========
    Route::post('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::get('/booking', [BookingController::class, 'get'])->name('booking.get');

    Route::post('/pay', [BookingController::class, 'pay_page_post'])->name('pay.post.index');
    Route::get('/pay', [BookingController::class, 'pay_page_get'])->name('pay.get.index');
});

//==========ADMIN==========
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    //==========MAIN==========
    Route::get('/', [AdminMainController::class, 'index'])->name('admin.index');
    Route::patch('/save_price', [AdminMainController::class, 'save_price'])->name('admin.save_price');
    Route::post('/save_ticket', [AdminMainController::class, 'save_ticket'])->name('admin.save_ticket');

    //==========REVIEWS==========
    Route::group(['prefix' => 'reviews',], function (){
        Route::get('/', [AdminReviewController::class, 'index'])->name('admin.reviews.index');
        Route::get('/{review}/edit', [AdminReviewController::class, 'edit'])->name('admin.reviews.edit');
        Route::patch('/{review}', [AdminReviewController::class, 'update'])->name('admin.reviews.update');
        Route::delete('/{review}', [AdminReviewController::class, 'delete'])->name('admin.reviews.delete');
    });

    //==========BLOG==========
    Route::group(['prefix' => 'blog',], function (){
        Route::get('/', [AdminBlogController::class, 'index'])->name('admin.blog.index');
        Route::get('/create', [AdminBlogController::class, 'create'])->name('admin.blog.create');
        Route::post('/', [AdminBlogController::class, 'store'])->name('admin.blog.store');
        Route::get('/{post}/edit', [AdminBlogController::class, 'edit'])->name('admin.blog.edit');
        Route::patch('/{post}', [AdminBlogController::class, 'update'])->name('admin.blog.update');
    });

    //==========BOOKING_ORDERS==========
    Route::group(['prefix' => 'orders'], function (){
        Route::get('/', [OrdersController::class, 'index'])->name('admin.orders.index');
        Route::get('/{order}/edit', [OrdersController::class, 'edit'])->name('admin.orders.edit');
        Route::patch('/{order}', [OrdersController::class, 'update'])->name('admin.orders.update');
        Route::delete('/{order}', [OrdersController::class, 'delete'])->name('admin.orders.delete');
    });

    //==========PARTNERS==========
    Route::group(['prefix' => 'partners',], function (){
        Route::get('/', [PartnersController::class, 'index'])->name('admin.partners.index');
        Route::get('/accept-application/{application}', [PartnersController::class, 'accept_application'])->name('admin.partners.accept_application');
        Route::get('/accept-withdraw/{withdraw}', [PartnersController::class, 'accept_withdraw'])->name('admin.partners.accept_withdraw');
    });

    //==========SALES==========
    Route::group(['prefix' => 'promocodes'], function (){
        Route::get('/', [SalesController::class, 'index'])->name('admin.promocodes.index');
        Route::get('/create', [SalesController::class, 'create'])->name('admin.promocodes.create');
        Route::post('/store', [SalesController::class, 'store'])->name('admin.promocodes.store');
    });

    //==========USERS==========
    Route::get('/users', [UsersController::class, 'index'])->name('admin.users.index');

});

Auth::routes();
Route::get('/tg-auth/\'{hash}\'', [App\Http\Controllers\TGAuth::class, 'index'])->name('tg.auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/fk-verify.html', function () {return('9cd0b00d60d9926a56aef563928a8162');});

#Route::get('/test', '\App\Http\Controllers\TestController@index')->name('test');


//By sleepy_siemens 2024 Jan
//2001sema@gmail.com
//TG: @sleepysiemens
