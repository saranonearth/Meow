<?php

use Illuminate\Support\Facades\Route;



Route::get('/', 'App\Http\Controllers\IndexController@index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
