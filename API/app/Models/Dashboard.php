<?php

require_once 'db/Conexion.php'; 

class Dashboard {

    private $db;
    private $connection;

    public function __construct() {
        // Crear una instancia de la clase Database y conectarse a la base de datos
        $this->db = new Database();
        $this->connection = $this->db->connect();
    }

    public function getIndicators() {
        $stmt = $this->connection->prepare("CALL getIndicators()");    
        // Ejecutar la consulta
        $stmt->execute();
        $result = $stmt->get_result();
        $user = [];
    
        while ($row = $result->fetch_assoc()) {
            $user[] = $row;
        }
    
        $stmt->close();
    
        return $user;
    }

    
}