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

Route::prefix('tasks')->group(function() {

  
    Route::get('', 'App\Http\Controllers\TaskController@index')->name('task.index');
    Route::get('/sortable', 'App\Http\Controllers\TaskController@indexsortable')->name('task.indexsortable');
    Route::get('/advancedsort', 'App\Http\Controllers\TaskController@indexadvancedsort')->name('task.indexadvancedsort');
   


});
Route::prefix('ratings')->group(function() {

  
    Route::get('', 'App\Http\Controllers\RatingController@index')->name('rating.index');
    Route::get('/create', 'App\Http\Controllers\RatingController@create')->name('rating.create');
    Route::post('/store', 'App\Http\Controllers\RatingController@store')->name('rating.store');
    Route::get('/createjavascript', 'App\Http\Controllers\RatingController@createjavascript')->name('rating.createjavascript');
    Route::post('/storejavascript', 'App\Http\Controllers\RatingController@storejavascript')->name('rating.storejavascript');
   


});
Route::prefix('taskstatuses')->group(function() {

  
   // Route::get('', 'App\Http\Controllers\RatingController@index')->name('rating.index');
    Route::get('/create', 'App\Http\Controllers\TaskStatusController@create')->name('taskstatus.create');
    Route::post('/store', 'App\Http\Controllers\TaskStatusController@store')->name('taskstatus.store');
   // Route::get('/createjavascript', 'App\Http\Controllers\RatingController@createjavascript')->name('rating.createjavascript');
  //  Route::post('/storejavascript', 'App\Http\Controllers\RatingController@storejavascript')->name('rating.storejavascript');
   


});