<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/blog', 'HomeController@blog')->name('home.blog');
Route::get('/shop', 'HomeController@shop')->name('home.shop');
Route::get('/about', 'HomeController@about')->name('home.about');
Route::get('/contact', 'HomeController@contact')->name('home.contact');
Route::post('/contact', 'HomeController@post_contact')->name('home.contact');
Route::get('/login','HomeController@login')->name('home.login');
Route::post('/login','HomeController@post_login')->name('home.login');
Route::get('/logout','HomeController@logout')->name('home.logout');
Route::get('/register','HomeController@create')->name('home.register');
Route::post('/register','HomeController@post_create')->name('home.register');
Route::post('add-rating','RatingController@add')->name('add-rating');
Route::post('add-review','ReviewController@add')->name('add-review');
/**
 * GET=>account.index => danh sach
 * GET=>account.create =>form moi
 * GET=>account.show => xem chi tiet
 * GET=>account.edit => hien thi form edit
 * POST=>account.store => khi submit form them moi
 * PUT=>account.update => khi submit form edit
 * DELETE=>account.destroy =>khi xoa
 */
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/','AdminController@dashboard')->name('admin.dashboard');
    Route::get('/logout','AdminController@logout')->name('logout');
    Route::get('/file','AdminController@file')->name('admin.file');

    Route::resources([
        'category' => 'CategoryController',
        'product' => 'ProductController',
        'user' => 'UserController',
        'account' => 'AccountController',
        'order' => 'OrderController',
    ]);
});
Route::get('admin/login','AdminController@login')->name('login');
Route::post('admin/login','AdminController@post_login')->name('login');
Route::get('category/{id}','HomeController@view')->name('view');
Route::group(['prefix'=>'cart'],function(){
   Route::get('view','CartController@view')->name('cart.view');
   Route::get('add/{id}','CartController@add')->name('cart.add');
   Route::get('add-quantity/{id}','CartController@add_quantity')->name('cart.add_quantity');
   Route::get('remove/{id}','CartController@remove')->name('cart.remove');
   Route::get('clear','CartController@clear')->name('cart.clear');
});

Route::group(['prefix'=>'checkout'],function(){
    Route::get('/','CheckoutController@form')->name('checkout');
    Route::post('/','CheckoutController@submit_form')->name('checkout');

    Route::get('/checkout-success','CheckoutController@success')->name('checkout.success');
 });

Route::get('update/{key}/{qty}','CartController@update')->name('cart.update');