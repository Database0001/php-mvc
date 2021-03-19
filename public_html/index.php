<?php

$modules = glob('../modules/*.php');

foreach ($modules as $module) {
    include($module);
}

include(base_path('\route\route.php'));

include(base_path('\general\error_handling.php'));
