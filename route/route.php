<?php

use App\Http\Controllers\Home\HomeController;
use Modules\Route\Route;

Route::request("/home", HomeController::class, [
    ['GET', 'get'],
    ['POST', 'post']
]);

Route::resource('/homev2', HomeController::class);
