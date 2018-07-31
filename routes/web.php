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

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Auth::routes();
Route::get('/myblog', 'UsersController@index');
Route::get('/profile', 'UsersController@profile');
Route::post('/profile/update', 'UsersController@update');

Route::get('/myblog/delete/{id}', 'ContentsController@subjectDelete');
Route::get('/myblog/edit/{id}', 'ContentsController@subjectEdit');
Route::post('/myblog/edit', 'ContentsController@contentEdit');
Route::get('/newblog', 'ContentsController@newblog');
Route::post('/newblog/add', 'ContentsController@add');
Route::get('/seemore/{id}', 'ContentsController@detail');
