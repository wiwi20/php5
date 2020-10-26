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

Route::get('/', 'NewItemController@index')->name('news');
Route::get('/about-us', 'AboutController@show')->name('about');
Route::get('news', 'NewItemController@index')->name('news');
Route::get('/news/create', 'NewItemController@create')->name('news.create');
Route::post('/news/store',  'NewItemController@store')->name('news.store');
Route::get('/news/{id}', 'NewItemController@show')->name('news.show');
Route::get('/search', 'NewItemController@search')->name('news.search');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/user', 'UserController@index')->name('user');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


