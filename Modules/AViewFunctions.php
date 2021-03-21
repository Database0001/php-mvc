<?php

function include_part($view, $data = null)
{
    Modules\Template::include($view, $data);
}
