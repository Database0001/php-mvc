<?php

use Modules\DB;

set_time_limit(0);
session_start();

define('START', microtime(true));

$includes = ['../modules/*.php', '../abstracts/*.php', '../app/Models/*.php'];

foreach ($includes as $path) {
    $files = glob($path);
    foreach ($files as $file) {
        include($file);
    }
}

$db = [];

$db[] = new DB('test-mvc');

include(base_path('\route\route.php'));

include(base_path('\general\http\error_handling.php'));

define('END', microtime(true));

echo "<br><br>" . (END - START) . " Milisaniyede yüklendi.";
