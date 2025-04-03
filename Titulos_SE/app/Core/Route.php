<?php

namespace App\Core;

class Route {
    private static $routes = [];

    // Método para definir rutas GET
    public static function get($uri, $callback) {
        self::addRoute('GET', $uri, $callback);
    }

    // Método para definir rutas POST
    public static function post($uri, $callback) {
        self::addRoute('POST', $uri, $callback);
    }

    // Método privado para agregar rutas
    private static function addRoute($method, $uri, $callback) {
        $uri = trim($uri, '/');
        self::$routes[$method][$uri] = $callback;
    }

    // Método para despachar la solicitud
    public static function dispatch() {
        // Extraer el PATH de la URL
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $path = trim($path, '/');

        // Obtener el método HTTP
        $method = $_SERVER['REQUEST_METHOD'];

        // Verificar si existe una ruta para el método y PATH solicitados
        if (isset(self::$routes[$method])) {
            foreach (self::$routes[$method] as $route => $callback) {
                // Convertir los parámetros dinámicos (ej. :id) en expresiones regulares
                $pattern = preg_replace('#:([a-zA-Z]+)#', '([^/]+)', $route);
                $pattern = "#^$pattern$#";

                // Comprobar si la ruta coincide con el PATH
                if (preg_match($pattern, $path, $matches)) {
                    // Extraer los parámetros dinámicos
                    $params = array_slice($matches, 1);

                    // Ejecutar el callback o el controlador
                    try {
                        if (is_callable($callback)) {
                            $response = call_user_func_array($callback, $params);
                        } elseif (is_array($callback)) {
                            [$controller, $action] = $callback;
                            $controllerInstance = new $controller();
                            $response = call_user_func_array([$controllerInstance, $action], $params);
                        }

                        // Manejar la respuesta
                        self::sendResponse($response);
                        return;
                    } catch (\Exception $e) {
                        self::handleError(500, $e->getMessage());
                        return;
                    }
                }
            }
        }

        // Si no se encuentra ninguna ruta, devolver un error 404
        self::handleError(404, "Not Found");
    }

    // Método para enviar la respuesta
    private static function sendResponse($response) {
        if (is_array($response) || is_object($response)) {
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            echo $response;
        }
    }

    // Método para manejar errores
    private static function handleError($code, $message = '') {
        http_response_code($code);
        echo "$code $message";
    }
}
