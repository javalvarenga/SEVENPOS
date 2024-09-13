<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SevenPOS</title>
    <link rel="stylesheet" href="./styles/index.css">

    <script>
        const user = localStorage.getItem('USER');
        const currentPath = window.location.pathname;

        // Si no existe 'USER' y no está en la ruta '/login', redireccionar a '/login'
        if (!user && currentPath !== '/login') {
            window.location.href = '/login';
        }
    </script>
</head>

<body>
</body>

</html>

<?php
// index.php

// Define una lista de rutas válidas
$validRoutes = [
    '/',
    '/login',
    '/customers',
    '/sales',
    '/purchases',
    '/inventory',
    '/devolutions',
    '/payments',
    '/receivable',
    '/toPay',
    '/addSale'
];

// Obtiene la ruta solicitada
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


// Verifica si la ruta solicitada es válida
if (in_array($requestUri, $validRoutes)) {
    // Incluye el contenido de la ruta solicitada
    if ($requestUri === '/') {
        include 'screens/home.php';
    } elseif ($requestUri === '/login') {
        include 'screens/login.php';
    } elseif ($requestUri === '/customers') {
        include 'screens/customers.php';
    } elseif ($requestUri === '/sales') {
        include 'screens/sales.php';
    } elseif ($requestUri === '/purchases') {
        include 'screens/purchases.php';
    } elseif ($requestUri === '/inventory') {
        include 'screens/inventory.php';
    } elseif ($requestUri === '/devolutions') {
        include 'screens/devolutions.php';
    } elseif ($requestUri === '/payments') {
        include 'screens/payments.php';
    } elseif ($requestUri === '/receivable') {
        include 'screens/receivable.php';
    } elseif ($requestUri === '/toPay') {
        include 'screens/toPay.php';
    } elseif ($requestUri === '/addSale') {
        include 'screens/addSale.php';
    }
} else {
    // Si la ruta no es válida, muestra la página 404
    include 'screens/404.php';
}
?>