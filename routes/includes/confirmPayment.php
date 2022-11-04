<?php

use Illuminate\Support\Facades\Route;

Route::get('/confirmPayment', 'confirmPaymentController@index');
Route::get('/confirmPayment/{id}', 'confirmPaymentController@show');
Route::post('/confirmPayment', 'confirmPaymentController@store');
Route::post('/confirmPayment/{id}', 'confirmPaymentController@update');
Route::delete('/confirmPayment/{id}', 'confirmPaymentController@destroy');
