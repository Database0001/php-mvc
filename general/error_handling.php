<?php

use Modules\Route\Route;

if (!Route::$called) {
    abort(404);
}
