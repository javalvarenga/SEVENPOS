<?php
require_once 'db/Conexion.php'; // Asegúrate de que la ruta es correcta

class Sales {
    private $db;
    private $connection;

    public function __construct() {
        // Crear una instancia de la clase Database y conectarse a la base de datos
        $this->db = new Database();
        $this->connection = $this->db->connect();
    }

    public function getAll() {
        $result = $this->connection->query("SELECT id_cliente,nombre,direccion,telefono FROM clientes");
        $ventas = [];

        while ($row = $result->fetch_assoc()) {
            $ventas[] = $row;
        }

        return $ventas;
    }

    public function getById($id) {
        $stmt = $this->connection->prepare("SELECT id_cliente,nombre,direccion,telefono FROM ventas WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $venta = $result->fetch_assoc();
        $stmt->close();

        return $venta;
    }

    public function __destruct() {
        // Desconectar de la base de datos al destruir la instancia de Sales
        $this->db->disconnect();
    }
}
?>

