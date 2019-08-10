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

Route::get('/zakat', 'HomeController@zakat');
Route::get('/sumbangan', 'HomeController@sumbangan');
Route::get('/about', 'HomeController@about');

Route::group(['middleware' => ['web', 'user']], function(){
    Route::get('dashboard', 'UsersController@dashboard')->name('dashboard');
    Route::get('dashboard/zakat', 'ZakatController@index_user')->name('zakat.index.user');
    Route::get('dashboard/sumbangan', 'SumbanganController@index_user')->name('sumbangan.index.user');
    Route::get('dashboard/zakat/history', 'ZakatController@history_user')->name('zakat.history.user');
    Route::get('dashboard/sumbangan/history', 'SumbanganController@history_user')->name('sumbangan.history.user');
    Route::get('zakat/create', 'ZakatController@create_user')->name('zakat.create.user');
    Route::post('zakat', 'ZakatController@store')->name('zakat.store.user');
    Route::get('sumbangan/create', 'SumbanganController@create_user')->name('sumbangan.create.user');
    Route::post('sumbangan', 'SumbanganController@store')->name('sumbangan.store.user');
    Route::get('sumbangan/{username}', 'SumbanganController@show_user')->name('sumbangan.show.user');

});


Route::group(['prefix' => 'admin', 'middleware' => ['web','admin']], function(){
    Route::get('dashboard', 'UsersController@admindashboard')->name('dashboard.admin');
    Route::get('dashboard/zakat/history', 'ZakatController@history')->name('zakat.history');
    Route::get('dashboard/sumbangan/history', 'SumbanganController@history')->name('sumbangan.history');
    Route::resource('zakat', 'ZakatController');
    Route::resource('sumbangan', 'SumbanganController');
    Route::resource('pegawai', 'PegawaiController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
