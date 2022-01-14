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

Route::prefix('authors')->group(function() {
    // index.blade.php
    // create.blade.php
    // edit.blade.php

    // /authors
    Route::get('', 'App\Http\Controllers\AuthorController@index')->name('author.index');
    // authors/create
    Route::get('create', 'App\Http\Controllers\AuthorController@create')->name('author.create');
    // authors/edit
    Route::post('store', 'App\Http\Controllers\AuthorController@store')->name('author.store');
    Route::get('edit/{author}', 'App\Http\Controllers\AuthorController@edit')->name('author.edit');
    Route::get('show/{author}', 'App\Http\Controllers\AuthorController@show')->name('author.show');
    Route::post('update/{author}', 'App\Http\Controllers\AuthorController@update')->name('author.update');
    Route::post('destroy/{author}', 'App\Http\Controllers\AuthorController@destroy')->name('author.destroy');

});


// Route::prefix('authors')->group(function() {
//    Route::get('','App\Http\AuthorControllers@index')->name('author.index');
//    Route::get('create','App\Http\AuthorControllers@create')->name('author.create');
//    Route::get('edit','App\Http\AuthorControllers@edit')->name('author.edit');
// });

// Route::get('/autors/creat', function () {
//     return view('');
// });
