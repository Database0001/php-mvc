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
                    if ($method[0] == $_SERVER['REQUEST_METHOD']) {
                        $return = eval('return $class->' . $method[1] . '();');
                    }
                }

                echo $return ?? null;
            }
            if (@$return) {
                self::$called = 1;
            }
        }
    }
}
