<?php

function include_part()
{
    $args = func_get_args();
    call_user_func_array('template_include', $args);
}
