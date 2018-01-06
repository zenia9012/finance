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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout')->name('logout');


// costs route

Route::any('/costs/create', 'CostController@create')->name('create_cost');
Route::any('/costs', 'CostController@list')->name('list_cost');
Route::any('/costs/delete/{cost}', 'CostController@delete')->name('delete_cost');
Route::any('/costs/update/{cost}', 'CostController@update')->name('update_cost');


//products route

Route::any('product', 'ProductController@list')->name('product_list');
Route::any('product/create', 'ProductController@create')->name('product_create');
