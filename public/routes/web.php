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

Route::get('/', 'IndexController@index');

Route::get('/album/{id}', 'PhotosController@index');

Route::resource('/home', 'Admin\AlbumsResource')->middleware('auth');
Route::resource('/albums', 'Admin\AlbumsResource')->middleware('auth');

Route::resource('/photos', 'Admin\PhotosResource')->middleware('auth');

Route::get('/albums/view/{id}', 'Admin\AlbumsResource@view')->middleware('auth');

Route::get('/admin', 'Admin\ConfigController@index')->middleware('auth');
Route::match(['get', 'post'], '/save', 'Admin\ConfigController@store');

Auth::routes();

Route::get('/users', ['middleware' => ['auth'], 'uses'=>'Core@show']);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


