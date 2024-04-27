<?php

class Router
{
    private $routes;
    public function __construct()
    {
        $this->routes = [];
    }
    public function addRoute(string $method, string $path, string $controller, string $action)
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action
        ];
    }
    public function getHandler(string $method, string $uri)
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === $method) {
                // Remplacez les parties variables du chemin par des expressions régulières
                $pattern = preg_replace('~{([^/]+)}~', '(?P<$1>[^/]+)', $route['path']);
                $pattern = '~^' . $pattern . '$~';

                // Vérifiez si l'URI correspond au chemin avec des variables
                if (preg_match($pattern, $uri, $matches)) {
                    // Si la route correspond, récupérez le contrôleur, l'action et les valeurs des variables
                    $params = array_slice($matches, 1);
                    return [
                        'method' => $route['method'],
                        'controller' => $route['controller'],
                        'action' => $route['action'],
                        'params' => $params
                    ];
                }
            }
        }
        return null;
    }

}



