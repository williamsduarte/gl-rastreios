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
Route::get('/get/categories', 'CategoryController@all')->name('getCategories');
Route::post('/post/category', 'SubcategoryTrackingController@update')->name('postCategory');

Route::get('/get/subcategory/tracking', 'SubcategoryTrackingController@store')->name('categoryTracking');