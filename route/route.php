<?php

use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Resource\ResourceController;

use Modules\Route\Route;

Route::request("/home", HomeController::class, [
    [['GET'], 'get'],
    [['POST'], 'post']
]);

Route::request("/", function ($id = 0, $name = 1) {
    echo "$id $name";
    return " ";
}, ['GET']);

Route::resource('/homev2', ResourceController::class);