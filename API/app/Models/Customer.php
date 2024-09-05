<?php

require_once 'db/conexion.php'; 

class Customer {

    private $db;
    private $connection;

    public function __construct() {
        // Crear una instancia de la clase Database y conectarse a la base de datos
        $this->db = new Database();
        $this->connection = $this->db->connect();
    }

    public function getAll() {
       
        $result = $this->connection->query("SELECT id_cliente,nombre,direccion,telefono FROM clientes");
        $customers = [];

        while ($row = $result->fetch_assoc()) {
            $customers[] = $row;
        }

        return $customers;

    }

    public function getById($id) {
        // obtener un cliente por id
        $customers = $this->getAll();
        foreach ($customers as $customer) {
            if ($customer['id_cliente'] == $id) {
                return $customer;
            }
        }
        return null;
    }
}