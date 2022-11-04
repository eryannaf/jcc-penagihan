<?php

use Illuminate\Support\Facades\Route;

Route::get('/confirm', 'ConfirmController@index');
Route::get('/confirm/{id}', 'ConfirmController@show');
Route::post('/confirm', 'ConfirmController@store');
Route::post('/confirm/{id}', 'ConfirmController@update');
Route::delete('/confirm/{id}', 'ConfirmController@destroy');
