<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', 'PostController@index')->name('posts.index');
Route::post('/posts', 'PostController@store');
Route::get('/posts/create', 'PostController@create')->name('posts.create');
Route::get('/posts/{category}/{post}', 'PostController@show')->name('posts.show');
Route::get('/posts/{category}/{post}/edit', 'PostController@edit');
Route::put('/posts/{category}/{post}', 'PostController@update');
Route::get('/posts/{category}', 'PostController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
