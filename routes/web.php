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
Route::get('/','masukController@index')->name('index');
Route::get('/admin', function () {
    return view('Admin.admin');
});
Route::get('/users', function () {
    return view('Users.users');
});
Route::get('/login','masukController@login')->name('login');
Route::post('/loginPost','masukController@loginPost')->name('loginPost');
Route::get('/home/User','masukController@homeUser')->name('home.user');
Route::get('/home/Admin','masukController@homeAdmin')->name('home.admin');
Route::get('/logout','masukController@logout')->name('logout');
