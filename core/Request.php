<?php

namespace App\Core;

class Request
{
    /**
     * Get the request uri.
     *
     * @return string
     */
    public static function uri()
    {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
            '/'
        );
    }

    /**
     * Get the request method type.
     *
     * @return string
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
