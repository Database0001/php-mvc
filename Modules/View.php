<?php


function view()
{
    $args = func_get_args();

    $view = explode('.', $args[0]);
    $path = base_path('\resources\views');

    foreach ($view as $v) {
        $path .= "\\" . $v;
    }

    $file = $path . ".php";
    if (file_exists($file)) {
        $args[0] = $file;
        
        //return template_build(file_get_contents($file), $data);
        return call_user_func_array('template_build', $args);
    } else {
    }
}
