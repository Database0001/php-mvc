<?php

use Modules\Route\Route;

$called = Route::$called;

if (!$called) {
    abort(404);
}
