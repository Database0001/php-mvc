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

function host()
{
    $protocol = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://";
    $port = $_SERVER['SERVER_PORT'];

    $dont_show_port = [80, 443];

    return $protocol . $_SERVER['SERVER_NAME'] . (!empty($port) && !in_array($port, $dont_show_port) ? ":$port" : null);
}

function url($url = null)
{
    return $url == null ? $_SERVER['REQUEST_URI'] : host() . "/$url";
}

function ip()
{
    return ($_SERVER['HTTP_CLIENT_IP'] ?? ($_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR']));
}
