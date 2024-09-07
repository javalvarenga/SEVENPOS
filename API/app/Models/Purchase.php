<?php

require_once 'db/Conexion.php'; 

class Purchase {

    private $db;
    private $connection;

    public function __construct() {
        $this->db = new Database();
        $this->connection = $this->db->connect();
    }

    public function getAll() {
        $result = $this->connection->query("SELECT id_compra, id_proveedor, nombre_compra, fecha, total FROM compras");
        $purchases = [];

        while ($row = $result->fetch_assoc()) {
            $purchases[] = $row;
        }

        return $purchases;
    }

    public function getById($id) {
        $stmt = $this->connection->prepare("SELECT id_compra, id_proveedor, nombre_compra, fecha, total FROM compras WHERE id_compra = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $purchase = $result->fetch_assoc();
        $stmt->close();

        return $purchase ?: null;
    }
}
