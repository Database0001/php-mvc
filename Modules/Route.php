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
        
        if (count($_uri) == count($_url)) {
            foreach ($_url as $k => $_) {
                if (preg_match("/{[a-zA-Z0-9]+}/i", $_)) {
                    @$_url[$k] = $_uri[$k];
                }
            }
        }

        if ($_url == $_uri) { // $url == url()

            $request_method = (request('_method') ?? $_SERVER['REQUEST_METHOD']);

            $params = [];

            if (gettype($callback) == 'object') {

                if (in_array($request_method, $methods)) {
                    $return = call_user_func($callback, $params);
                }
            } elseif (gettype($callback) == 'string') {

                include("../" . $callback . ".php");

                $class = new $callback();

                foreach ($methods as $method) {
                    if (in_array($request_method, $method[0])) {
                        $return = call_user_func_array([$class, $method[1]], $params);
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
        return self::request($url, $class, [
            [['GET'], 'index'],
            [['POST'], 'store']
        ]);
    }
}
