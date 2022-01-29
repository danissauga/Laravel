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

Route::prefix('profileimages')->group(function() {


    Route::get('', 'App\Http\Controllers\ProfileImageController@index')->name('profileimage.index');
    Route::get('create', 'App\Http\Controllers\ProfileImageController@create')->name('profileimage.create');
    Route::post('store', 'App\Http\Controllers\ProfileImageController@store' )->name('profileimage.store');
    Route::get('edit/{profileImage}', 'App\Http\Controllers\ProfileImageController@edit')->name('profileimage.edit');
    Route::post('update/{profileImage}', 'App\Http\Controllers\ProfileImageController@update')->name('profileimage.update');

    //Route::get('', 'App\Http\Controllers\ProfileImagesController@index')->name('student.index');
   // Route::get('create', 'App\Http\Controllers\ProfileImageController@create')->name('image.create');
   // Route::post('store', 'App\Http\Controllers\ProfileImageController@store')->name('image.store');
    // Route::get('edit/{student}', 'App\Http\Controllers\StudentController@edit')->name('student.edit');
    // Route::get('show/{student}', 'App\Http\Controllers\StudentController@show')->name('student.show');
    // Route::post('update/{student}', 'App\Http\Controllers\StudentController@update')->name('student.update');
    // Route::post('destroy/{student}', 'App\Http\Controllers\StudentController@destroy')->name('student.destroy');

});