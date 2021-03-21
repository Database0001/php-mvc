<?php

function include_part()
{
    $args = func_get_args();
    Modules\Template::include($args[0], $args[1]);
}
