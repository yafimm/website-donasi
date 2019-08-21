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
Route::get('sumbangan/{username}', 'SumbanganController@show_user')->name('sumbangan.show_user');

Route::group(['middleware' => ['web', 'auth']], function(){
    Route::get('zakat/create', 'ZakatController@create_user')->name('zakat.create.user');
    Route::get('sumbangan/create', 'SumbanganController@create_user')->name('sumbangan.create.user');
    Route::post('dashboard/account', 'UsersController@update_account')->name('account.update');
    Route::put('dashboard/account/password', 'UsersController@update_password')->name('account.password.update');
    Route::get('pesan/history', 'Pesancontroller@index_history')->name('pesan.history');
    Route::resource('pesan', 'PesanController');
});

Route::group(['middleware' => ['web', 'user']], function(){
    Route::get('dashboard', 'UsersController@dashboard')->name('dashboard');
    Route::get('dashboard/account', 'UsersController@account')->name('account.index');
    Route::get('dashboard/zakat', 'ZakatController@index_user')->name('zakat.index.user');
    Route::get('dashboard/sumbangan', 'SumbanganController@index_user')->name('sumbangan.index.user');
    Route::get('dashboard/zakat/history', 'ZakatController@history_user')->name('zakat.history.user');
    Route::get('dashboard/sumbangan/history', 'SumbanganController@history_user')->name('sumbangan.history.user');
    Route::post('dashboard/sumbangan/update/', 'SumbanganController@update_status')->name('sumbangan.update.status');
    Route::get('dashboard/sumbangan/{sumbangan}', 'SumbanganController@show')->name('sumbangan.show.user');
    Route::get('dashboard/sumbangan/history', 'SumbanganController@history_user')->name('sumbangan.history.user');
    Route::get('dashboard/dhuafa', 'DhuafaController@index')->name('dhuafa.index');
    Route::get('dashboard/dhuafa/create', 'DhuafaController@create')->name('dhuafa.create');
    Route::get('dashboard/dhuafa/{id}', 'DhuafaController@show')->name('dhuafa.show');
    Route::delete('dashboard/dhuafa/{id}', 'DhuafaController@destroy')->name('dhuafa.destroy');
    Route::post('dashboard/dhuafa', 'DhuafaController@store')->name('dhuafa.store');
    Route::post('zakat', 'ZakatController@store')->name('zakat.store.user');
    Route::post('sumbangan', 'SumbanganController@store')->name('sumbangan.store.user');
});


Route::group(['prefix' => 'admin', 'middleware' => ['web','admin']], function(){
    Route::get('dashboard', 'UsersController@admindashboard')->name('dashboard.admin');
    Route::get('dashboard/account', 'UsersController@account')->name('account.index.admin');
    Route::get('dashboard/zakat/history', 'ZakatController@history')->name('zakat.history');
    Route::get('dashboard/sumbangan/history', 'SumbanganController@history')->name('sumbangan.history');
    Route::get('dashboard/pesan', 'PesanController@index_admin')->name('pesan.index-admin');
    Route::get('dashboard/pesan/history', 'PesanController@index_admin_history')->name('pesan.history-admin');
    Route::post('dashboard/pesan/{id}', 'PesanController@update_status')->name('pesan.update.status');
    Route::get('donatur', 'UsersController@index_donatur')->name('donatur.index');
    Route::get('donatur/{username}', 'UsersController@show')->name('donatur.show');
    Route::get('yayasan', 'UsersController@index_yayasan')->name('yayasan.index');
    Route::get('yayasan/{username}', 'UsersController@show')->name('yayasan.show');
    Route::post('dashboard/zakat/update/', 'ZakatController@update_status')->name('zakat.update.status');
    Route::get('zakat/cetak_pdf', 'ZakatController@cetak_pdf')->name('zakat.cetak-pdf');
    Route::get('sumbangan/cetak_pdf', 'SumbanganController@cetak_pdf')->name('sumbangan.cetak-pdf');
    Route::get('pegawai/cetak_pdf', 'PegawaiController@cetak_pdf')->name('pegawai.cetak-pdf');
    Route::resource('zakat', 'ZakatController');
    Route::resource('sumbangan', 'SumbanganController');
    Route::resource('pegawai', 'PegawaiController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
