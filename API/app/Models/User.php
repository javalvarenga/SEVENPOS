<?php

require_once 'db/Conexion.php'; 

class User {

    private $db;
    private $connection;

    public function __construct() {
        // Crear una instancia de la clase Database y conectarse a la base de datos
        $this->db = new Database();
        $this->connection = $this->db->connect();
    }

    public function login($username, $password) {
        $stmt = $this->connection->prepare("CALL users_login(?, ?)");
    
        // Vincular los parámetros (username y password)
        $stmt->bind_param("ss", $username, $password);
    
        // Ejecutar la consulta
        $stmt->execute();
        $result = $stmt->get_result();
        $user = [];
    
        while ($row = $result->fetch_assoc()) {
            $user[] = $row;
        }
    
        $stmt->close();
        
        // Debug: ver qué está devolviendo
        error_log("Login attempt - Username: $username, Result count: " . count($user));
        
        return $user;
    }

    
}