<?php

require_once 'db/Conexion.php';

class Purchase {
    private $db;
    private $connection;

    public function __construct() {
        $this->db = new Database();
        $this->connection = $this->db->connect();
    }

    // Insertar una nueva compra
    public function addPurchase($id_proveedor, $nombre_compra, $fecha, $detalles) {
        // Convertir el array de detalles a JSON
        $detalles_json = json_encode($detalles);
    
        // Preparar la llamada al procedimiento almacenado con 4 parámetros
        $stmt = $this->connection->prepare("CALL InsertarCompra(?, ?, ?, ?)");
    
        // Verificar si la preparación falló
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $this->connection->error);
        }
    
        // Vincular los parámetros al procedimiento almacenado
        $stmt->bind_param('isss', $id_proveedor, $nombre_compra, $fecha, $detalles_json);
    
        // Ejecutar el procedimiento almacenado
        if ($stmt->execute()) {
            // Obtener el resultado (el ID de la compra insertada)
            $result = $stmt->get_result();
    
            if ($result) {
                $row = $result->fetch_assoc();
                $compra_id = $row['compra_id'];
            } else {
                die("Error al obtener el resultado: " . $this->connection->error);
            }
        } else {
            die("Error en la ejecución del procedimiento: " . $this->connection->error);
        }
    
        $stmt->close();
    
        return isset($compra_id) ? $compra_id : null;
    }

    // Obtener todas las compras
    public function getAllPurchases() {
        $result = $this->connection->query("SELECT * FROM compras");
        $purchases = [];

        while ($row = $result->fetch_assoc()) {
            $purchases[] = $row;
        }

        return $purchases;
    }

    // Obtener una compra por ID
    public function getPurchaseById($id) {
        $stmt = $this->connection->prepare("SELECT * FROM compras WHERE id_compra = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $purchase = $result->fetch_assoc();
        $stmt->close();
        return $purchase;
    }

    // Eliminar una compra por ID
    public function deletePurchase($id) {
        $stmt = $this->connection->prepare("DELETE FROM compras WHERE id_compra = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $affectedRows = $stmt->affected_rows;
        $stmt->close();
        return $affectedRows > 0;
    }

    public function __destruct() {
        $this->db->disconnect();
    }
}
?>