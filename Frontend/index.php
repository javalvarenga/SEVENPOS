
<?php
// index.php

// Define una lista de rutas válidas
$validRoutes = [
    '/',
    '/customers',
    '/sales'
];

// Obtiene la ruta solicitada
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


// Verifica si la ruta solicitada es válida
if (in_array($requestUri, $validRoutes)) {
    // Incluye el contenido de la ruta solicitada
    if ($requestUri === '/') {
        include 'screens/home.php'; 
    } elseif ($requestUri === '/customers') {
        include 'screens/customers.php';
    } elseif ($requestUri === '/sales') {
        include 'screens/sales.php'; 
    }
} else {
    // Si la ruta no es válida, muestra la página 404
    include '404.php';
}
