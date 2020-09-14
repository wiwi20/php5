<?php

use Illuminate\Support\Facades\Route;
use App\NewsItem;
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

Route::get('/about-us', 'AboutController@show')->name('about');
Route::get('news', 'NewItemController@index')->name('news');
Route::get('/news/create', 'NewItemController@create')->name('news.create');
Route::post('/news/store',  'NewItemController@store')->name('news.store');
Route::get('/news/{id}', 'NewItemController@show')->name('news.show');
