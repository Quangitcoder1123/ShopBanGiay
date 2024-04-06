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

Route::group(
    ['middleware' => 'locale'],
    function () {
        Route::get('change-language/{language}', 'changeLanguageController@changeLanguage')
            ->name('user.change-language');
    }
);
Route::get('/', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact');

Route::post('send', 'ContactController@save')->name('Contact.send');

Route::get('login','Auth.LoginController@index');

Auth::routes(
    [
        'verify' => false,
    ]
);

Route::name('admin.')->prefix('admin')->middleware(['auth', 'can:accessAdmin'])->group(
    function () {
        Route::get('dashboard', 'DashboardController@index')->name('index');
        Route::resource('category', 'CategoryController');
        Route::resource('banner', 'BannerController');
        Route::resource('product', 'ProductController');
        Route::resource('deal', 'DealController');
        Route::resource('user', 'Auth\UserController');
        Route::resource('order', 'OrderController');
        Route::resource('review', 'ReviewController');
        Route::resource('contacts', 'ContactController');
    }
);

Route::get('/search', 'HomeController@search');


route::get('product/show/{id}', 'ProductController@show')->name('product.show');
route::get('product/show-all', 'ProductController@showAll')->name('product.showAll');
route::get('category/show/{id}', 'CategoryController@show')->name('category.show');

Route::resource('account', 'Auth\AccountController');

Route::get('account/{id}/changePass', 'Auth\AccountController@changePass')->name('account.changePass');
Route::post('account/{id}/updatePass', 'Auth\AccountController@updatePass')->name('account.updatePass');
Route::post('add-cart', 'CartController@save_cart')->name('addCart');
Route::middleware(['auth'])->group(function () {
    Route::get('order/create', 'OrderController@create')->name('order.create');
    Route::post('order/store', 'OrderController@store')->name('order.store');
    Route::post('review/store', 'ReviewController@store')->name('review.store');
    Route::get('order/{id}/history', 'OrderController@history')->name('order.history');
    Route::post('order/cancel/{id}', 'OrderController@cancel')->name('order.cancel');
    Route::get('order/history-detail/{id}', 'OrderController@historyDetail')->name('order.history-detail');
     Route::get('vnPayCheck', 'OrderController@vnPayCheck')->name('order.vnPayCheck');
});

Route::get('show-cart', 'CartController@show_cart')->name('showCart');
Route::post('update-qty-cart{id}', 'CartController@update_quantity')->name('updateCart');
Route::get('delete-cart/{rowId}', 'CartController@delete_cart')->name('deleteCart');

Route::get('/filter', 'HomeController@filter');


Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/{provider}/callback', 'SocialController@callback');

Route::post('add-wishlist', 'WishlistController@save_wishlist')->name('addWish')->middleware('auth');
Route::get('show-wishlist/{id}', 'WishlistController@show_wishlist')->name('showWish');
Route::post('delete-wishlist/{rowId}', 'WishlistController@delete_wishlist')->name('deleteWish');


Route::get('demo','HomeController@indexdemo');
//vnpay
 

