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

Route::get('/', 'HomeController@index');
Route::get('/zakat', 'HomeController@zakat');
Route::get('/sumbangan', 'HomeController@sumbangan');
Route::get('/about', 'HomeController@about');

Route::group(['middleware' => ['web', 'auth']], function(){
    Route::get('zakat/create', 'ZakatController@create_user')->name('zakat.create.user');
    Route::get('sumbangan/{username}', 'SumbanganController@show_user')->name('sumbangan.show_user');
    Route::get('sumbangan/create', 'SumbanganController@create_user')->name('sumbangan.create.user');
});

Route::group(['middleware' => ['web', 'user']], function(){
    Route::get('dashboard', 'UsersController@dashboard')->name('dashboard');
    Route::get('dashboard/zakat', 'ZakatController@index_user')->name('zakat.index.user');
    Route::get('dashboard/sumbangan', 'SumbanganController@index_user')->name('sumbangan.index.user');
    Route::get('dashboard/zakat/history', 'ZakatController@history_user')->name('zakat.history.user');
    Route::get('dashboard/sumbangan/history', 'SumbanganController@history_user')->name('sumbangan.history.user');
    Route::post('dashboard/sumbangan/update/', 'SumbanganController@update_status')->name('sumbangan.update.status');
    Route::get('dashboard/sumbangan/{sumbangan}', 'SumbanganController@show')->name('sumbangan.show.user');
    Route::get('dashboard/sumbangan/history', 'SumbanganController@history_user')->name('sumbangan.history.user');
    Route::post('zakat', 'ZakatController@store')->name('zakat.store.user');
    Route::post('sumbangan', 'SumbanganController@store')->name('sumbangan.store.user');
});


Route::group(['prefix' => 'admin', 'middleware' => ['web','admin']], function(){
    Route::get('dashboard', 'UsersController@admindashboard')->name('dashboard.admin');
    Route::get('dashboard/zakat/history', 'ZakatController@history')->name('zakat.history');
    Route::get('dashboard/sumbangan/history', 'SumbanganController@history')->name('sumbangan.history');
    Route::get('donatur', 'UsersController@index_donatur')->name('donatur.index');
    Route::get('donatur/{username}', 'UsersController@show')->name('donatur.show');
    Route::get('yayasan', 'UsersController@index_yayasan')->name('yayasan.index');
    Route::get('yayasan/{username}', 'UsersController@show')->name('yayasan.show');
    Route::post('dashboard/zakat/update/', 'ZakatController@update_status')->name('zakat.update.status');
    Route::resource('zakat', 'ZakatController');
    Route::resource('sumbangan', 'SumbanganController');
    Route::resource('pegawai', 'PegawaiController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
