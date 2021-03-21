<?php

function template_build($file = null, $args = [])
{
    global $db;

    extract($args);

    ob_start();
    include($file);
    $fileContent = ob_get_contents();
    ob_end_clean();

    foreach ($args as $data_key => $data_val) {

        if (gettype($data_val) === "object" || gettype($data_val) === "array") {
            $data_val = json_encode($data_val, JSON_UNESCAPED_UNICODE);
        }

        $fileContent = str_replace(["{{ $$data_key }}", "{!! $$data_key !!}"], [htmlspecialchars($data_val), $data_val], $fileContent);
    }

    // $patterns = [
    //     "/{{ \$[a-zA-Z0-9]+ }}/i",
    //     "/{!! \$[a-zA-Z0-9]+ !!}/i",
    // ];

    // foreach ($patterns as $pattern) {
    //     if (preg_match_all($pattern, $fileContent, $arr)) {
    //         print_r($arr);
    //     }
    // }

    return $fileContent;
}

function template_include()
{
    echo call_user_func_array('view', func_get_args());
}
