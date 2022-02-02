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

Route::prefix('articles')->group(function() {

    Route::get('', 'App\Http\Controllers\ArticleController@index')->name('article.index')->middleware('auth');
    Route::get('create', 'App\Http\Controllers\ArticleController@create')->name('article.create')->middleware('auth');
    Route::post('store', 'App\Http\Controllers\ArticleController@store')->name('article.store');
    Route::get('edit/{article}', 'App\Http\Controllers\ArticleController@edit')->name('article.edit');
    Route::get('show/{article}', 'App\Http\Controllers\ArticleController@show')->name('article.show')->middleware('auth');
    Route::post('update/{article}', 'App\Http\Controllers\ArticleController@update')->name('article.update');
    Route::post('destroy/{article}', 'App\Http\Controllers\ArticleController@destroy')->name('article.destroy');

});
Route::prefix('articlecategories')->group(function() {

    Route::get('', 'App\Http\Controllers\ArticleCategoryController@index')->name('articlecategory.index')->middleware('auth');
    Route::get('create', 'App\Http\Controllers\ArticleCategoryController@create')->name('articlecategory.create');
    Route::post('store', 'App\Http\Controllers\ArticleCategoryController@store')->name('articlecategory.store');
    Route::get('edit/{articleCategory}', 'App\Http\Controllers\ArticleCategoryController@edit')->name('articlecategory.edit');
    Route::get('show/{articleCategory}', 'App\Http\Controllers\ArticleCategoryController@show')->name('articlecategory.show');
    Route::post('update/{articleCategory}', 'App\Http\Controllers\ArticleCategoryController@update')->name('articlecategory.update');
    Route::post('destroy/{articleCategory}', 'App\Http\Controllers\ArticleCategoryController@destroy')->name('articlecategory.destroy');

});
Route::prefix('articleimages')->group(function() {

    Route::get('', 'App\Http\Controllers\ArticleImageController@index')->name('articleimage.index')->middleware('auth');
    Route::get('create', 'App\Http\Controllers\ArticleImageController@create')->name('articleimage.create');
    Route::post('store', 'App\Http\Controllers\ArticleImageController@store')->name('articleimage.store');
    Route::get('edit/{articleImage}', 'App\Http\Controllers\ArticleIamgeController@edit')->name('articleimage.edit');
    Route::get('show/{articleImage}', 'App\Http\Controllers\ArticleImageController@show')->name('articleimage.show');
    Route::post('update/{articleImage}', 'App\Http\Controllers\ArticleImageController@update')->name('articleimage.update');
    Route::post('destroy/{articleImage}', 'App\Http\Controllers\ArticleImageController@destroy')->name('articleimage.destroy');

});