<?php

namespace Modules\Route;

class Route
{

    static $called = 0;

    public static function request($url, $callback, $methods = [])
    {

        if ($url == $_SERVER['REQUEST_URI']) {
            if (gettype($callback) == 'object') {
                $return = $callback();
            } elseif (gettype($callback) == 'string') {

                include("../" . $callback . ".php");
                $class = new $callback();

                foreach ($methods as $method) {
                    if (in_array((request('_method') ?? $_SERVER['REQUEST_METHOD']), $method[0])) {
                        $return = eval('return $class->' . $method[1] . '();');
                    }
                }

                if ($return) {
                    echo $return;
                } else {
                    abort(404);
                }
            }
            if (@$return) {
                self::$called = 1;
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
