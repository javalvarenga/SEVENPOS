<?php
require_once 'db/Conexion.php'; 

class Customer {
    private $db;
    private $connection;

    public function __construct() {
        // Crear una instancia de la clase Database y conectarse a la base de datos
        $this->db = new Database();
        $this->connection = $this->db->connect();
    }

    public function getAll() {
        $result = $this->connection->query("SELECT * FROM clientes");
        $clientes = [];

        while ($row = $result->fetch_assoc()) {
            $clientes[] = $row;
        }

        return $clientes;
    }

    public function getHistorialid($id) 
    {
        // Preparar la consulta SQL para llamar al procedimiento almacenado
        $stmt = $this->connection->prepare("CALL HistorialCliente(?)");

        // Vincular los parámetros a la consulta
        $stmt->bind_param('i', $id);

        // Ejecutar la consulta
        $stmt->execute();

        $result = $stmt->get_result();
        $purchases = []; // Inicializar el array

        while ($row = $result->fetch_assoc())
        {
            $purchases[] = $row;
        }

        $stmt->close();
        return $purchases;
    }


    public function __destruct() {
        $this->db->disconnect();
    }
    
}
?>