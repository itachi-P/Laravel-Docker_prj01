<?php

Route::get('/', function () {
    return view('welcome');
});

# Laravelが最初から用意してあるmigrationを利用したuser
Route::get('/user', 'UserController@index');

# 画像アップロード
Route::get('/home', 'HomeController@index');
Route::post('/upload', 'HomeController@upload');
