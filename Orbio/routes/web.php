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

Route::prefix('Restaurants')->group(function() {
    Route::get('', 'App\Http\Controllers\RestaurantController@index')->name('restaurant.index');
    Route::post('storeAjax', 'App\Http\Controllers\RestaurantController@storeAjax')->name('restaurant.storeAjax');
    Route::post('deleteAjax/{restaurant}', 'App\Http\Controllers\RestaurantController@destroyAjax')->name('restaurant.destroyAjax');
    Route::get('showAjax/{restaurant}', 'App\Http\Controllers\RestaurantController@showAjax')->name('restaurant.showAjax');
    Route::post('updateAjax/{restaurant}', 'App\Http\Controllers\RestaurantController@updateAjax')->name('restaurant.updateAjax');
    Route::get('searchAjax', 'App\Http\Controllers\RestaurantController@searchAjax')->name('restaurant.searchAjax');
    Route::get('indexAjax', 'App\Http\Controllers\RestaurantController@indexAjax')->name('restaurant.indexAjax');
});

Route::get('/', function () {
    return view('welcome');
});