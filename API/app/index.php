<?php

// Permitir solicitudes desde cualquier origen
header('Access-Control-Allow-Origin: *');
// Permitir métodos HTTP específicos
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
// Permitir cabeceras específicas
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Autocarga de clases
spl_autoload_register(function ($class) {
    require_once 'Controllers/' . str_replace('\\', '/', $class) . '.php';
});

// Obtener la URL y descomponerla
$url = parse_url($_SERVER['REQUEST_URI']);
$path = $url['path'];

// Verificar si la URL contiene parámetros de consulta (query string)
$getParams = [];
if (isset($url['query'])) {
    parse_str($url['query'], $getParams);
}

// Obtener el método HTTP
$method = $_SERVER['REQUEST_METHOD'];

// Procesar el cuerpo de la solicitud POST
$postParams = [];
if ($method === 'POST') {
    $rawData = file_get_contents('php://input');
    $postParams = json_decode($rawData, true);
    // Verificar si la decodificación fue exitosa
    if (json_last_error() !== JSON_ERROR_NONE) {
        // Manejar el error de decodificación
        echo 'Error al decodificar el JSON: ' . json_last_error_msg();
        exit;
    }
}

// Combinar los parámetros GET y POST
$params = array_merge($getParams, $postParams);

// Eliminar la barra inicial si existe
$path = ltrim($path, '/');

// Separar la ruta en partes
$parts = explode('/', $path);

// Obtener el controlador y la acción
$controllerName = ucfirst($parts[0]) . 'Controller';
$actionName = $parts[1] ?? 'index';

// Verificar si el controlador y la acción existen
if (class_exists($controllerName)) {
    $controller = new $controllerName;
    if (method_exists($controller, $actionName)) {
        // Llamar a la acción, pasando los parámetros

        $controller->$actionName($params);
    } else {
        // Manejar error: Acción no encontrada
        echo 'Acción no encontrada';
    }
} else {
    // Manejar error: Controlador no encontrado
    echo 'Controlador no encontrado';
}