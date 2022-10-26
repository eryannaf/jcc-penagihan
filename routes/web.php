<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require_once('includes/auth.php');
require_once('includes/dashboard.php');
require_once('includes/member.php');

Route::group([
    'middleware' => 'auth',
], function() {

});
