<?php

$modules = glob('../modules/*.php');

foreach ($modules as $module) {
    include($module);
}

include('../route/route.php');