<?php

namespace App\Core;

class Router
{
    /**
     * Array of registered routes.
     *
     * @var array
     */
    public $routes = [
        'GET' => [],
        'POST' => [],
    ];

    /**
     * Load router file.
     *
     * @param  string $file
     * @return \App\Core\Router
     */
    public static function load($file)
    {
        $router = new self;

        require $file;

        return $router;
    }

    /**
     * Register a get route.
     *
     * @param string $uri
     * @param string $controller
     */
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * Register a post route.
     *
     * @param string $uri
     * @param string $controller
     */
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * Invoke the requestes method on the controller.
     *
     * @param string $uri
     * @param string $requestType
     */
    public function direct($uri, $requestType)
    {
        if (! array_key_exists($uri, $this->routes[$requestType])) {
            throw new \Exception('There isn\'t any route for this URI.');
        }

        $controller = $this->routes[$requestType][$uri][0];
        $method = $this->routes[$requestType][$uri][1];

        return $this->callMethod(
            $controller,
            $method
        );
    }

    /**
     * Call requested method on the controller.
     *
     * @param string $controllerName
     * @param string $method
     */
    public function callMethod($controller, $method)
    {
        $controller = new $controller;

        if (! method_exists($controller, $method)) {
            throw new \Exception("{$controllerName} does not respond to the {$method} method.");
        }

        return $controller->$method();
    }
}
