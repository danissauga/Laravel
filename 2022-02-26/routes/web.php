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

Route::prefix('owners')->group(function() {

    Route::get('', 'App\Http\Controllers\OwnerController@index')->name('owner.index');
    Route::get('create', 'App\Http\Controllers\OwnerController@create')->name('owner.create');
    Route::post('store', 'App\Http\Controllers\OwnerController@store')->name('owner.store');
    Route::get('edit/{owner}', 'App\Http\Controllers\OwnerController@edit')->name('owner.edit');
    Route::get('show/{owner}', 'App\Http\Controllers\OwnerController@show')->name('owner.show');
    Route::post('update/{owner}', 'App\Http\Controllers\OwnerController@update')->name('owner.update');
    Route::post('destroy/{owner}', 'App\Http\Controllers\OwnerController@destroy')->name('owner.destroy');

});

Route::prefix('tasks')->group(function() {

    Route::get('', 'App\Http\Controllers\TaskController@index')->name('task.index');
    Route::get('create', 'App\Http\Controllers\TaskController@create')->name('task.create');
    Route::post('store', 'App\Http\Controllers\TaskController@store')->name('task.store');
    Route::get('edit/{task}', 'App\Http\Controllers\TaskController@edit')->name('task.edit');
    Route::get('show/{task}', 'App\Http\Controllers\TaskController@show')->name('task.show');
    Route::post('update/{task}', 'App\Http\Controllers\TaskController@update')->name('task.update');
    Route::post('destroy/{task}', 'App\Http\Controllers\TaskController@destroy')->name('task.destroy');

});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
