<?php

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


Route::get('/', 'PagesController@index')->name('home');
Route::get('/about', 'PagesController@about');
Route::get('/faq', 'PagesController@faq');
Route::get('/404', 'PagesController@error404');

// User
Route::get('/users/{id}','UsersController@profile')->name('profile');
Route::post('/users/{id}/update','UsersController@update')->name('update_user');
Route::delete('/users/{id}/delete','UsersController@delete')->name('delete_user');


// Authentication
Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Google Auth
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

//Product
Route::get('/products/{id}','ProductController@page')->name('page');
Route::post('/products/{id}/favorite','ProductController@favorite');
Route::post('/products/{id}/unfavorite','ProductController@unfavorite');

//Reviews
Route::post('review/{id}', 'ReviewController@create');

//Cart
Route::get('/cart/{id}','CartController@page')->name('cart');
