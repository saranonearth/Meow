<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

Route::get('/', 'App\Http\Controllers\IndexController@index');
Route::post('/posts', 'App\Http\Controllers\PostsController@add');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
