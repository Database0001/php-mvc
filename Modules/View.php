<?php


function view($view, $args = [], $ext = "php")
{
    $args = func_get_args();

    $view = explode('.', $view);
    $path = base_path('\resources\views');

    foreach ($view as $v) {
        $path .= "\\" . $v;
    }

    $file = "$path.$ext";
    if (file_exists($file)) {
        $args[0] = $file;

        //return template_build(file_get_contents($file), $data);
        return call_user_func_array('template_build', $args);
    } else {
    }
}
