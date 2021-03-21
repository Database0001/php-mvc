<?php

use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Resource\ResourceController;

use Modules\Route\Route;

Route::request("/", HomeController::class, [
    [['GET'], 'get'],
    [['POST'], 'post']
]);

Route::resource('/home', ResourceController::class);

Route::request("/test-static", function () {
    return "Anasayfa";
}, ['GET']);
