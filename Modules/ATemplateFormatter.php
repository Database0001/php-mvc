<?php

namespace Modules;

class Template
{
    public static function build($fileContent = null, $data = [])
    {

        foreach ($data as $data_key => $data_val) {

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

    public static function include($view, $data = [])
    {
        echo view($view, $data);
    }
}
