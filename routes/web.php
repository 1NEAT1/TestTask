<?php

Route::get('/', 'IndexController@create')->name('home');
Route::post('/', 'IndexController@addCreate');
Route::get('/createEmail', 'IndexController@createEmail');
Route::post('/createEmail', 'IndexController@addEmail');
Route::get('/show/key={key}', 'IndexController@show');
