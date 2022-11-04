<?php

use Illuminate\Support\Facades\Route;

// Route::get('/member', 'MemberController@index');
// Route::get('/member/{id}', 'MemberController@show');
// Route::post('/pesan', 'PesanController@store');
Route::post('/pesan/{id}', 'DashboardMemberController@store');
// Route::delete('/member/{id}', 'MemberController@destroy');
