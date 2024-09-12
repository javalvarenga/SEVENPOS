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
    public function addPurchase($id_compra, $id_proveedor, $nombre_compra, $fecha, $total, $detalles) {
        // Convertir los detalles a JSON
        $detalles_json = json_encode($detalles);
    
        // Preparar la llamada al procedimiento almacenado
        $stmt = $this->connection->prepare("CALL insertarCompra(?, ?, ?, ?, ?, ?)");
    
        if (!$stmt) {
            // Si ocurre un error al preparar la consulta
            die('Error en prepare: ' . $this->connection->error);
        }
    
        // Vincular los parámetros
        $stmt->bind_param('iissds', $id_compra, $id_proveedor, $nombre_compra, $fecha, $total, $detalles_json);
    
        // Ejecutar el procedimiento almacenado
        if (!$stmt->execute()) {
            die('Error en execute: ' . $stmt->error);
        }
    
        // Usar bind_result en lugar de get_result()
        $stmt->bind_result($compra_id);
    
        // Obtener el valor del ID de la compra
        if ($stmt->fetch()) {
            $stmt->close();
            return $compra_id;
        } else {
            // Si no se obtuvo resultado, muestra el error
            die('Error al obtener resultado: ' . $stmt->error);
        }
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
