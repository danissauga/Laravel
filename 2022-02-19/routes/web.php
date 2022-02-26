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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('categories')->group(function() {

    Route::get('', 'App\Http\Controllers\CategoryController@index')->name('category.index');
    Route::get('create', 'App\Http\Controllers\CategoryController@create')->name('category.create');
    Route::get('createvalidate', 'App\Http\Controllers\CategoryController@createvalidate')->name('category.createvalidate');
    Route::post('storevalidate', 'App\Http\Controllers\CategoryController@storevalidate')->name('category.storevalidate');
    Route::get('create/advanced', 'App\Http\Controllers\CategoryController@createadvanced')->name('category.createadvanced');

    Route::post('store', 'App\Http\Controllers\CategoryController@store')->name('category.store');
    Route::get('edit/{category}', 'App\Http\Controllers\CategoryController@edit')->name('category.edit');
    Route::post('update/{category}', 'App\Http\Controllers\CategoryController@update')->name('category.update');
    Route::get('show/{category}', 'App\Http\Controllers\CategoryController@show')->name('category.show'); 
    Route::post('destroy/{category}', 'App\Http\Controllers\CategoryController@destroy')->name('category.destroy');

});
Route::prefix('posts')->group(function() {

    Route::get('', 'App\Http\Controllers\PostController@index')->name('post.index');
    Route::get('create', 'App\Http\Controllers\PostController@create')->name('post.create');
    Route::post('store', 'App\Http\Controllers\PostController@store')->name('post.store');
    Route::get('edit/{post}', 'App\Http\Controllers\PostController@edit')->name('post.edit');
    Route::post('update/{post}', 'App\Http\Controllers\PostController@update')->name('post.update'); 
    Route::post('destroy/{post}', 'App\Http\Controllers\PostController@destroy')->name('post.destroy');
    Route::get('show/{post}', 'App\Http\Controllers\PostController@show')->name('post.show'); 

});

Route::get('/', function () {
    return redirect()->route('post.index');
});