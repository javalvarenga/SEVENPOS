<?php
// Simular una base de datos de usuarios
$users = [
    ["id" => 1, "name" => "Juan Pérez", "email" => "juan@example.com"],
    ["id" => 2, "name" => "Ana Gómez", "email" => "ana@example.com"],
    ["id" => 3, "name" => "Carlos Ruiz", "email" => "carlos@example.com"]
];

// Obtener todos los usuarios
function getUsers() {
    global $users;
    echo json_encode($users);
}

// Obtener un usuario por ID
function getUserById($id) {
    global $users;
    foreach ($users as $user) {
        if ($user["id"] == $id) {
            echo json_encode($user);
            return;
        }
    }
    echo json_encode(["message" => "User not found"]);
}

// Manejar la solicitud según el método y los parámetros
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["id"])) {
        getUserById($_GET["id"]);
    } else {
        getUsers();
    }
} else {
    echo json_encode(["message" => "Method not supported"]);
}