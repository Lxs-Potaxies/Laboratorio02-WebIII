<?php

class Router {
    private $routes = [];

    public function get($route, $controller) {
        $this->routes['GET'][$route] = $controller;
    }

    public function post($route, $controller) {
        $this->routes['POST'][$route] = $controller;
    }

    public function resolve() {
        // Obtiene la URI actual
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        // Busca la ruta correspondiente
        foreach ($this->routes[$method] as $route => $controller) {
            if ($uri === $route) {
                list($controllerName, $methodName) = explode('@', $controller);
                $controllerInstance = new $controllerName();
                return $controllerInstance->$methodName();
            }
        }

        // Si no se encontró la ruta, podrías manejarlo aquí (404, por ejemplo)
        http_response_code(404);
        echo '404 Not Found';
    }
}
