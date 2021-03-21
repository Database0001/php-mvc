<?php

function base_path($url = null)
{
    return dirname(__DIR__) . $url;
}

function public_path($url = null)
{
    return base_path(env('public_path')) . $url;
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

function session()
{

    $args = func_get_args();

    if (!isset($args[0]))
        return $_SESSION;

    $type = gettype($args[0]);

    if ($type == "string") {
        if (isset($args[0]))
            return $_SESSION[$args[0]] ?? ($_SESSION[@$args[1]] ?? null);
    } elseif ($type == "array") {
        if (isset($args[0]))
            foreach ($args[0] as $key => $val) {
                $_SESSION[$key] = $val;
            }

        return true;
    }

    return false;
}

function env($name = null)
{

    $file = fopen(base_path('/.env'), 'r');

    $env = [];

    while (($line = fgets($file)) !== false) {
        $line = explode('=', $line);

        $env[$line[0]] = "";

        foreach ($line as $key => $val) {
            if ($key == 0)
                continue;

            $env[$line[0]] .= ($key > 1 ? "=" : null) . $val;
        }

        if ($name == $line[0]) {
            return $env[$line[0]];
        }
    }

    fclose($file);

    return $env;
}
