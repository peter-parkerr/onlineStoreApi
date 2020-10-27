<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');
Route::post('register', 'Auth\RegisterController@register');

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('shops', 'ShopController@index');
    Route::get('shops/{shop}', 'ShopController@show');
    Route::post('shops', 'ShopController@store');
    Route::put('shops/{shop}', 'ShopController@update');
    Route::delete('shops/{shop}', 'ShopController@delete');
    Route::get('products', 'ProductController@index');
    Route::get('products/{product}', 'ProductController@show');
    Route::post('products', 'ProductController@store');
    Route::put('products/{product}', 'ProductController@update');
    Route::delete('products/{product}', 'ProductController@delete');



});
/********** Admin Routes********/
Route::group(['middleware' => ['auth:api','admin:api']], function (){
    Route::put('approveSeller/{seller}', 'AdminController@approveSeller');
    Route::put('rejectSeller/{seller}', 'AdminController@rejectSeller');
    Route::put('approveShop/{shop}', 'AdminController@approveShop');
    Route::put('rejectShop/{shop}', 'AdminController@rejectShop');
    Route::put('approveProduct/{product}', 'AdminController@approveProduct');
    Route::put('rejectProduct/{product}', 'AdminController@rejectProduct');
    Route::get('getSellerDetails/{seller}', 'AdminController@show');
});
