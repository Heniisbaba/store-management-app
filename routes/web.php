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

Route::get('/', function () {
    return view('index');
});

Route::resource('admin', 'AdminsController');
Route::resource('products', 'ProductsController');
Route::resource('categories', 'CategoryController');
Route::resource('brands', 'BrandController');
Route::resource('supplies', 'SuppliesController');
Route::post('/supply', 'SupplierSuppliesController@create');
Route::post('/search', 'ajaxController@search');
Route::post('/itempurchase', 'ajaxController@purchase');
Route::get('/', 'IndexController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'ajaxController@index');