<?php

namespace Modules\Route;

class Route
{

    static $called = 0;

    public static function request($url, $callback, $methods = [])
    {

        $uri = url();

        $_uri = array_filter(explode("/", $uri));
        $_url = array_filter(explode("/", $url));

        $args = [];

        if (count($_uri) == count($_url)) {
            foreach ($_url as $k => $_) {
                if (preg_match("/{[a-zA-Z0-9]+}/i", $_)) {
                    $_url[$k] = $_uri[$k];
                    $args[$k] = $_uri[$k];
                }
            }
        }

        if ($_url == $_uri) { // $url == url()

            $request_method = (request('_method') ?? $_SERVER['REQUEST_METHOD']);

            if (gettype($callback) == 'object') {

                if (in_array($request_method, $methods)) {
                    $return = call_user_func_array($callback, $args);
                }
            } elseif (gettype($callback) == 'string') {

                include(base_path("/$callback.php"));

                $class = new $callback();

                foreach ($methods as $method) {
                    if (in_array($request_method, $method[0])) {
                        $return = call_user_func_array([$class, $method[1]], $args);
                    }
                }
            }

            if (@$return) {
                self::$called = 1;
                echo $return;
            } else {
                abort(404);
            }
        }
    }

    public static function resource($url, $class)
    {
        self::request($url, $class, [
            [['GET'], 'index'],
            [['POST'], 'store']
        ]);

        self::request("$url/create", $class, [
            [['GET'], 'create']
        ]);

        self::request("$url/{id}", $class, [
            [['GET'], 'show'],
            [['PUT', 'PATCH'], 'update'],
            [['DELETE'], 'destroy']
        ]);

        self::request("$url/{id}/edit", $class, [
            [['GET'], 'edit']
        ]);
    }
}
