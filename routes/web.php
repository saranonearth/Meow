<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

Route::get('/', 'App\Http\Controllers\IndexController@index');
Route::post('/posts', 'App\Http\Controllers\PostsController@add');
Route::get('/post/{postid}', 'App\Http\Controllers\PostsController@getOne');
Route::post('/comments', 'App\Http\Controllers\CommentController@add');
Route::get('/posts/{userid}', 'App\Http\Controllers\PostsController@getUserPosts');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
