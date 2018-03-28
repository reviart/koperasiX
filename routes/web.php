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


Auth::routes();
Route::get('/operator/home', 'HomeController@index')->name('operator.dashboard');
Route::get('/test', 'PdfController@index')->name('pdf');

Route::prefix('admin')->group(function () {
  Route::get('home', 'Admin\AdminController@index')->name('admin.dashboard');
  Route::post('logout', 'Admin\AdminController@logout')->name('admin.logout');
  Route::get('register', 'Admin\AdminController@create')->name('admin.register');
  Route::post('register', 'Admin\AdminController@store')->name('admin.register.submit');
  //----------------------------------
  Route::get('login', 'Admin\AdminLoginController@login')->name('admin.login');
  Route::post('login', 'Admin\AdminLoginController@loginAdmin')->name('admin.login.submit');
});

Route::prefix('kontrak')->group(function () {
  Route::get('/', 'KontrakController@index')->name('kontrak.index');
  Route::get('create', 'KontrakController@create')->name('kontrak.create');
  Route::get('detail/{id}', 'KontrakController@detail')->name('kontrak.detail');
  Route::get('printall', 'KontrakController@printAll')->name('kontrak.print');
  Route::get('printdet/{id}', 'KontrakController@printDetail')->name('kontrak.printdet');
  Route::get('store', 'KontrakController@create')->name('kontrak.store');
  Route::post('store', 'KontrakController@store')->name('kontrak.store.submit');
  Route::get('edit/{id}', 'KontrakController@show')->name('kontrak.edit');
  Route::put('saveEdit/{id}', 'KontrakController@update')->name('kontrak.edit.submit');
  Route::delete('destroy/{id}', 'KontrakController@destroy')->name('kontrak.destroy');
});

Route::prefix('biaya')->group(function () {
  Route::get('/', 'BiayaController@index')->name('biaya.index');
  Route::get('detail/{id}', 'BiayaController@detail')->name('biaya.detail');
  Route::get('print/{id}', 'BiayaController@print')->name('biaya.print');
  //----------------------------------
  Route::get('create/{id}', 'BiayaController@create')->name('biaya.create');
  Route::get('store', 'BiayaController@create')->name('biaya.store');
  Route::post('store', 'BiayaController@store')->name('biaya.store.submit');
  Route::get('edit/{id}', 'BiayaController@show')->name('biaya.edit');
  Route::put('saveEdit/{id}', 'BiayaController@update')->name('biaya.edit.submit');
  Route::delete('destroy/{id}', 'BiayaController@destroy')->name('biaya.destroy');
});

Route::prefix('penerimaan')->group(function () {
  Route::get('/', 'PenerimaanController@index')->name('penerimaan.index');
  Route::get('detail/{id}', 'PenerimaanController@detail')->name('penerimaan.detail');
  Route::get('print/{id}', 'PenerimaanController@print')->name('penerimaan.print');
  //----------------------------------
  Route::get('create/{id}', 'PenerimaanController@create')->name('penerimaan.create');
  Route::get('store', 'PenerimaanController@create')->name('penerimaan.store');
  Route::post('store', 'PenerimaanController@store')->name('penerimaan.store.submit');
  Route::get('edit/{id}', 'PenerimaanController@show')->name('penerimaan.edit');
  Route::put('saveEdit/{id}', 'PenerimaanController@update')->name('penerimaan.edit.submit');
  Route::delete('destroy/{id}', 'PenerimaanController@destroy')->name('penerimaan.destroy');
});
  /*----------------------------------
  Route::get('password/reset', 'Curtner\CurtnerForgotPasswordController@showLinkRequestForm')->name('curtner.password.request');
  Route::post('password/email', 'Curtner\CurtnerForgotPasswordController@sendResetLinkEmail')->name('curtner.password.email');
  Route::get('password/reset/{token}', 'Curtner\CurtnerResetPasswordController@showResetForm')->name('curtner.password.reset');
  Route::post('password/reset', 'Curtner\CurtnerResetPasswordController@reset')->name('curtner.password.reset.submit');
  */
