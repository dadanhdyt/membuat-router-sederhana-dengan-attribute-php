<?php
function parseRoute($controllers)
{
    foreach ($controllers as $key => $value) {
        $routes = [];
        $reflection = new ReflectionClass($value);
        $methods = $reflection->getMethods();
        foreach ($methods as $method) {
            foreach ($method->getAttributes(Route::class) as $attribute) {
                $route = $attribute->newInstance();
                $routes[] = [
                    'path' => $route->route,
                    'method' => $route->method,
                    'controller' => $value,
                    'action' => $method->getName(),
                ];
            }
        }
    }

    $pathInfo = $_SERVER['PATH_INFO'];
    foreach ($routes as $route) {
        if (preg_match("#^" . $route['path'] . "$#", $pathInfo, $mathes)) {
            array_shift($mathes);
            $controller = new $route['controller']();
            $method = $route['action'];
            echo $controller->$method(...$mathes);
        }
    }
}
