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

Route::get('/', 'TweetsController@index');
Auth::routes();

Route::get('/tweets', 'TweetsController@index');
Route::get('/tweets/new', 'TweetsController@new')->middleware('auth');
Route::post('/tweets', 'TweetsController@store')->middleware('auth');
Route::get('/users/{user}', 'UsersController@show')->middleware('auth');
Route::delete('/tweets/{tweet}', 'TweetsController@destroy')->middleware('auth');
Route::get('/tweets/{tweet}/edit', 'TweetsController@edit')->middleware('auth');
Route::patch('/tweets/{tweet}', 'TweetsController@update')->middleware('auth');
Route::get('/tweets/{tweet}', 'TweetsController@show');
Route::resource('tweets.comments', 'CommentsController', ['only' => 'store'])->middleware('auth');

