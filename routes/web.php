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

Route::get('/test', function(){
    return view('zakat.create');
});

// Route::group(['middleware' => ['web']], function(){
// });

Route::group(['prefix' => 'admin', 'middleware' => ['web']], function(){
    Route::get('dashboard', 'UsersController@admindashboard');
    Route::resource('zakat', 'ZakatController');
    Route::resource('donasi', 'DonasiController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
