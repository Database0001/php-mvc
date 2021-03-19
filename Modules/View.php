<?php

function view($view, $data = [])
{
    $view = explode('.', $view);
    $path = base_path('\resources\views');

    foreach ($view as $v) {
        $path .= "\\" . $v;
    }

    $file = $path . ".blade.php";
    if (file_exists($file)) {
        return blade(file_get_contents($file), $data);
    } else {
        abort(404);
    }
}
