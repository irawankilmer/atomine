<?php
namespace Atomine\core;
class Route
{
    private static $routes = [];

    public static function get(String $uri, array $action)
    {
        return self::$routes[] = [
            'method'    => 'GET',
            'uri'       => $uri,
            'action'    => $action
        ];
    }

    public static function post(String $uri, array $action)
    {
        return self::$routes[] = [
            'method'    => 'POST',
            'uri'       => $uri,
            'action'    => $action
        ];
    }

    public static function run()
    {
        foreach (self::$routes as $route) {
            $pattern = preg_replace('/\{([^\}]+)\}/', '([^/]+)', $route['uri']);
            $pattern = str_replace('/', '\/', $pattern);
            $pattern = "/^{$pattern}$/";

            if ($route['method'] === $_SERVER['REQUEST_METHOD'] && preg_match($pattern, $_SERVER['PATH_INFO'], $matches)) {
                // Panggil controller dan metodenya dengan parameter yang sesuai
                list($controllerClass, $method) = $route['action'];
                $controller = new $controllerClass();

                // Hapus elemen pertama yang berisi URI lengkap
                array_shift($matches);

                return call_user_func_array([$controller, $method], $matches);
            }
        }
        // Handle 404 Not Found jika rute tidak ditemukan
        http_response_code(404);
        return 'Not Found';
    }
}