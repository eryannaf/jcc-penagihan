<?php

use Illuminate\Support\Facades\Route;

Route::get('/inventaris', 'InventarisController@index');
Route::get('/inventaris/{id}', 'InventarisController@show');
Route::post('/inventaris', 'InventarisController@store');
Route::post('/inventaris/{id}', 'InventarisController@update');
Route::delete('/inventaris/{id}', 'InventarisController@destroy');
