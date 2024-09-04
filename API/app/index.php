<?php
// index.php

spl_autoload_register(function ($class) {
    require_once 'Controllers/' . str_replace('\\', '/', $class) . '.php';
});

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Eliminar la barra inicial y dividir la URI en segmentos
$uriSegments = explode('/', trim($uri, '/'));

// Extraer el nombre del controlador y la acción de la URI
$controllerName = ucfirst($uriSegments[0] ?? '') . 'Controller';
$actionName = $uriSegments[1] ?? 'index';


// Recoger los parámetros adicionales solo si existen
$params = array_slice($uriSegments, 2);


if (class_exists($controllerName)) {
    $controller = new $controllerName();
    if (method_exists($controller, $actionName)) {
        // Obtener información sobre el método
        $reflection = new ReflectionMethod($controller, $actionName);
        $paramCount = $reflection->getNumberOfParameters();

        // Llamar al método del controlador con los parámetros necesarios
        if ($paramCount > 0) {
            $params = array_slice($params, 0, $paramCount);
            $reflection->invokeArgs($controller, $params);
        } else {
            $controller->$actionName();
        }
    } else {
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found: Action does not exist";
    }
} else {
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found: Controller does not exist";
}