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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/categorias', 'CategoryController@index')->name('categories');
Route::get('/get/categories', 'CategoryController@store')->name('getCategories');
Route::get('/get/category/tracking', 'CategoryTrackingController@store')->name('categoryTracking');