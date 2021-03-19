<?php

function base_path($url = null)
{
    return dirname(__DIR__) . $url;
}

function abort($code = null)
{
    $response = http_response_code($code);
    if ($code) {
        echo view('errors.' . $code);
        exit;
    }

    return $response;
}
