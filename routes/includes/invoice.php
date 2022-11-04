<?php

use Illuminate\Support\Facades\Route;

Route::get('/invoice', 'InvoicesController@index');
Route::get('/invoice/{id}', 'InvoicesController@show');
Route::post('/invoice', 'InvoicesController@store');
Route::post('/invoice/{id}', 'InvoicesController@update');
Route::delete('/invoice/{id}', 'InvoicesController@destroy');
Route::post('/invoiceStatus/{id}', 'InvoicesController@updateStatus');
