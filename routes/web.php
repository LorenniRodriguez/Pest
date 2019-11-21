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

Route::get('/', 'FrontEndController@home');
Route::get('/about', 'FrontEndController@about');
Route::get('/gallery', 'FrontEndController@gallery');
Route::get('/blog', 'FrontEndController@blog');
Route::get('/contact', 'FrontEndController@contact');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
