<?php

use App\Http\Controllers\Home\HomeController;
use Modules\Route\Route;

Route::request("/home", HomeController::class, [
    ['GET', 'get'],
    ['POST', 'post']
]);

if (!Route::$called) {
    abort(404);
}
