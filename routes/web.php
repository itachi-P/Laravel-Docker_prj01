<?php

Route::get('/', function () {
    return view('welcome');
});

# Laravelがデフォルトで用意してあるmigrationを利用したusers
Route::get('/user', 'UserController@index');

# 画像アップロード
Route::get('/home', 'HomeController@home');
Route::post('/upload', 'HomeController@upload');
