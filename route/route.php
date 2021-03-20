<?php

use App\Http\Controllers\Home\HomeController;
use Modules\Route\Route;

Route::request("/home", HomeController::class, [
    [['GET'], 'get'],
    [['POST'], 'post']
]);

Route::request("/{id}/{name}", function ($id, $name) {
    echo "$id $name";
    return " ";
}, ['GET']);

//Route::resource('/homev2', HomeController::class);
