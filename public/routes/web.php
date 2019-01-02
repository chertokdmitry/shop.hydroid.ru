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
Route::get('/home', 'HomeController@main')->name('home')->middleware('auth');
Route::get('/home/category/{path}', 'HomeController@homecategory')->middleware('auth');

Route::get('/search',['uses' => 'SearchController@getSearch','as' => 'search']);
Route::get('/update/search', 'SearchUpdate@products');
Route::get('/', 'IndexController@index');
Route::get('/update/products', 'UpdateController@products');
Route::get('/update/categories', 'UpdateController@categories');
Route::get('/categories', 'UpdateController@categories');
Route::get('/category/{path}', 'IndexController@category');
Route::get('/productcategories', 'UpdateController@productCategories');
Route::get('/product/{id}', 'ProductController@index');



