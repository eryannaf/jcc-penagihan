<?php

use Illuminate\Support\Facades\Route;

require_once('includes/auth.php');


Route::group([
    'middleware' => 'auth',
], function() {
    require_once('includes/dashboard.php');
    require_once('includes/member.php');
    require_once('includes/inventaris.php');
    require_once('includes/confirm.php');
    require_once('includes/user.php');
    require_once('includes/invoice.php');
    require_once('includes/dashboardMember.php');
    require_once('includes/confirmPayment.php');

});
