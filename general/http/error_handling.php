<?php

use Modules\Route;

$called = Route::$called;

if (!$called) {
    abort(404);
}
