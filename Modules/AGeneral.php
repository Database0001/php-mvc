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

$requests = [];

function appendRequest($key, $val, $keyword)
{
    global $requests;

    if (!isset($requests[$key])) {
        return $requests[$key] = $val;
    } else {
        return $requests[$keyword . $key] = $val;
    }

    return false;
}

function request($key = null)
{
    global $requests;

    if ($key)
        return $_REQUEST[$key] ?? null;

    foreach ($_POST ?? [] as $post_key => $post) {
        if (!empty($post))
            appendRequest($post_key, $post, "post_");
    }

    foreach ($_GET ?? [] as $get_key => $get) {
        if (!empty($get))
            appendRequest($get_key, $get, "get_");
    }

    return $requests;
}

function url()
{
    return $_SERVER['REQUEST_URI'];
}
