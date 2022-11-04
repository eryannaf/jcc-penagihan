<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware'=>'role:User',
], function() {
    Route::get('/dashboardMember', 'DashboardMemberController@index');
});


