<?php

use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Resource\ResourceController;

use Modules\Route;

Route::request("/", HomeController::class, [
    [['GET'], 'index'],
    [['POST'], 'test']
]);

Route::resource('/home', ResourceController::class);

Route::request("/test-blade", function () {
    return view('modules.test.index', ['selam' => "<button>sa</button>"]);
}, ['GET']);
