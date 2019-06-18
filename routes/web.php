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

Route::post('/send', 'EmailController@send_email')->name('send');
Route::post('/send_custom', 'EmailController@send_custom')->name('send_custom');
Route::get('/index', 'EmailController@index')->name('index');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
