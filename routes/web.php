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
Route::get("/post/{id}/status","postController@status");

Route::get('lang/{lang}', ['as' => 'language.change', 'uses' => 'LanguageController@changeLang']);
Route::get('/post/all/edit','postController@edit_post');
Route::get('/post/pending','postController@pending');
Route::resource('/post','postController');
Route::get('/post/{id}/disable','postController@disable');
Route::get('/post/{id}/delete','postController@destroy');
Route::get('/post/{id}/active','postController@active');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post/{id}/status','postController@status');
