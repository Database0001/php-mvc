<?php

function view($view, $data = [])
{
    $view = explode('.', $view);
    $path = base_path('\resources\views');

    foreach ($view as $v) {
        $path .= "\\" . $v;
    }

    $file = $path . ".blade.php";

    echo blade(file_get_contents($file), $data);
}
