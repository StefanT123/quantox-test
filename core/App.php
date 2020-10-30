<?php

namespace App\Core;

class App
{
    /**
     * Array of all binded services.
     *
     * @var array
     */
    protected static $bindings = [];

    /**
     * Bind some service to the container.
     *
     * @param  string $key
     * @param  mixed  $value
     * @return void
     */
    public static function bind(string $key, $value)
    {
        self::$bindings[$key] = $value;
    }

    /**
     * Get the binded value from the container.
     *
     * @param  string $key
     * @return mixed
     */
    public static function get(string $key)
    {
        if (! array_key_exists($key, self::$bindings)) {
            throw new \Exception("The {$key} is not bound to the container.");
        }

        return self::$bindings[$key];
    }
}
