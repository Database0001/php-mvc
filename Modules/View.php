<?php

use Modules\Blade;

function view($view, $data = [])
{
    $view = explode('.', $view);
    $path = base_path('\resources\views');

    foreach ($view as $v) {
        $path .= "\\" . $v;
    }

    $file = $path . ".blade.php";
    if (file_exists($file)) {
        return Blade::build(file_get_contents($file), $data);
    } else {
    }
}
