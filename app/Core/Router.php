<?php

namespace App\Core;

class Router
{
    protected array $routes = [];
    protected array $params = [];

    public function __construct()
    {
        $routes = require_once 'config/routes.php';
        foreach ($routes as $key => $val) {
            $this->addRoute($key, $val);
        }
    }

    /**
     * @param string $route
     * @param array $params
     * @return void
     */
    private function addRoute(string $route, array $params): void
    {
        $route = "#^$route$#";
        $this->routes[$route] = $params;
    }

    /**
     * @return bool
     */
    private function match(): bool
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        $url = strtok($url, '?');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run(): void
    {
        if ($this->match()) {
            $path = 'App\Controllers\\' . $this->params['controller'];
            if (class_exists($path)) {
                $action = $this->params['action'];
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    View::renderError(404);
                }
            } else {
                View::renderError(404);
            }
        } else {
            View::renderError(404);
        }
    }
}