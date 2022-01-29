<?php

use Illuminate\Support\Facades\Route;

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

    Route::get('', 'App\Http\Controllers\ArticleController@index')->name('article.index');
    Route::get('create', 'App\Http\Controllers\ArticleController@create')->name('article.create');
    Route::post('store', 'App\Http\Controllers\ArticleController@store')->name('article.store');
    Route::get('edit/{article}', 'App\Http\Controllers\ArticleController@edit')->name('article.edit');
    Route::get('show/{article}', 'App\Http\Controllers\ArticleController@show')->name('article.show');
    Route::post('update/{article}', 'App\Http\Controllers\ArticleController@update')->name('article.update');
    Route::post('destroy/{article}', 'App\Http\Controllers\ArticleController@destroy')->name('article.destroy');

});
Route::prefix('articlecategory')->group(function() {

    Route::get('', 'App\Http\Controllers\ArticleCategoryController@index')->name('articlecategory.index');
    Route::get('create', 'App\Http\Controllers\ArticleCategoryController@create')->name('articlecategory.create');
    Route::post('store', 'App\Http\Controllers\ArticleCategoryController@store')->name('articlecategory.store');
    Route::get('edit/{articleCategory}', 'App\Http\Controllers\ArticleCategoryController@edit')->name('articlecategory.edit');
    Route::get('show/{articleCategory}', 'App\Http\Controllers\ArticleCategoryController@show')->name('articlecategory.show');
    Route::post('update/{articleCategory}', 'App\Http\Controllers\ArticleCategoryController@update')->name('articlecategory.update');
    Route::post('destroy/{articleCategory}', 'App\Http\Controllers\ArticleCategoryController@destroy')->name('articlecategory.destroy');

});
Route::prefix('articleimage')->group(function() {

    Route::get('', 'App\Http\Controllers\ArticleImageCategoryController@index')->name('articlecategory.index');
    Route::get('create', 'App\Http\Controllers\ArticleImageCategoryController@create')->name('articlecategory.create');
    Route::post('store', 'App\Http\Controllers\ArticleImageCategoryController@store')->name('articlecategory.store');
    Route::get('edit/{articleCategory}', 'App\Http\Controllers\ArticleIamgeCategoryController@edit')->name('articlecategory.edit');
    Route::get('show/{articleCategory}', 'App\Http\Controllers\ArticleImageCategoryController@show')->name('articlecategory.show');
    Route::post('update/{articleCategory}', 'App\Http\Controllers\ArticleImageCategoryController@update')->name('articlecategory.update');
    Route::post('destroy/{articleCategory}', 'App\Http\Controllers\ArticleImageCategoryController@destroy')->name('articlecategory.destroy');

});