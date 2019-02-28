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
Route::get('/master',function(){
	return view('layouts.master');
});
Route::get('/admin',function(){
	return view('layouts.admin');
});
Route::get('/posts','PostsController@index');
Route::get('/posts/{post}','PostsController@show')->where('post','[0-9]+');
Route::get('/posts/{post}/edit','PostsController@edit');
Route::get('/posts/create','PostsController@create');
Route::post('/posts','PostsController@store');
Route::PUT('/posts/update/{post}','PostsController@update');
Route::DELETE('/posts/destroy/{post}','PostsController@destroy');
Route::get('/register','RegisterController@create');
Route::get('/login','SessionController@create');
Route::post('/login','SessionController@store');
Route::get('/logout','SessionController@logout');
Route::post('/register','RegisterController@store');
Route::post('/addComment','CommentController@store');