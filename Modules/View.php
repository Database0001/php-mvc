<?php

use Modules\Template;

function view($view, $data = [])
{
    $view = explode('.', $view);
    $path = base_path('\resources\views');

    foreach ($view as $v) {
        $path .= "\\" . $v;
    }

    $file = $path . ".php";
    if (file_exists($file)) {
        //return Template::build(file_get_contents($file), $data);

        ob_start();
        include($file);
        $output = ob_get_contents();
        ob_end_clean();

        return Template::build($output, $data);
    } else {
    }
}
