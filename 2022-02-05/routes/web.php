<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('productcategories')->group(function() {

    Route::get('create', 'App\Http\Controllers\ProductCategoryController@create')->name('productcategory.create');
    Route::post('store', 'App\Http\Controllers\ProductCategoryController@store')->name('productcategory.store');
    Route::get('', 'App\Http\Controllers\ProductCategoryController@index')->name('productcategory.index');
    Route::get('search', 'App\Http\Controllers\ProductCategoryController@search')->name('productcategory.search');
    Route::get('edit/{productCategory}', 'App\Http\Controllers\ProductCategoryController@edit')->name('productcategory.edit');
    Route::post('update/{productCategory}', 'App\Http\Controllers\ProductCategoryController@update')->name('productcategory.update');
    Route::post('destroy/{productCategory}', 'App\Http\Controllers\ProductCategoryController@destroy')->name('productcategory.destroy');      


});
Route::prefix('products')->group(function() {


    Route::get('', 'App\Http\Controllers\ProductController@index')->name('product.index');
    Route::get('categoryfilter', 'App\Http\Controllers\ProductController@categoryfilter')->name('product.categoryfilter');
    Route::get('create', 'App\Http\Controllers\ProductController@create')->name('product.create');
    Route::post('store', 'App\Http\Controllers\ProductController@store' )->name('product.store');
    Route::get('edit/{product}', 'App\Http\Controllers\ProductController@edit')->name('product.edit');
    Route::post('update/{product}', 'App\Http\Controllers\ProductController@update')->name('product.update');
    Route::post('destroy/{product}', 'App\Http\Controllers\ProductController@destroy')->name('product.destroy');


});
Route::prefix('clients')->group(function() {


    Route::get('', 'App\Http\Controllers\ClientController@index')->name('client.index');
    // Route::get('categoryfilter', 'App\Http\Controllers\ProductController@categoryfilter')->name('product.categoryfilter');
    Route::get('create', 'App\Http\Controllers\ProductController@create')->name('client.create');
    // Route::post('store', 'App\Http\Controllers\ProductController@store' )->name('product.store');
    Route::get('edit/{product}', 'App\Http\Controllers\ClientController@edit')->name('client.edit');
    Route::post('update/{product}', 'App\Http\Controllers\ClientController@update')->name('client.update');
    //Route::post('destroy/{product}', 'App\Http\Controllers\ProductController@destroy')->name('product.destroy');


});