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
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/', 'IndexController@index');
Route::get('/products', 'UpdateController@products');
Route::get('/categories', 'UpdateController@categories');
Route::get('/category/{path}', 'IndexController@category');
Route::get('/productcategories', 'UpdateController@productCategories');
Route::get('/product/{id}', 'ProductController@index');



