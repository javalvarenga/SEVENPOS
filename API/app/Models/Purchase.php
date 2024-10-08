<?php

require_once 'db/Conexion.php';

class Purchase {
    private $db;
    private $connection;

    public function __construct() {
        $this->db = new Database();
        $this->connection = $this->db->connect();
    }

    // Cargar datos
    public function addPurchase($id_proveedor, $nombre_compra, $fecha, $detalles) {
        $detalles_json = json_encode($detalles);
    
        $stmt = $this->connection->prepare("CALL InsertarCompra(?, ?, ?, ?)");
    
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $this->connection->error);
        }
    
        $stmt->bind_param('isss', $id_proveedor, $nombre_compra, $fecha, $detalles_json);
    
        if ($stmt->execute()) {

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
            $query = "SELECT c.id_compra, c.fecha, p.nombre AS proveedor_nombre, d.id_producto, pr.nombre AS producto_nombre, d.cantidad, d.subtotal
                FROM compras c
                JOIN detalle_compras d ON c.id_compra = d.id_compra
                JOIN proveedores p ON c.id_proveedor = p.id_proveedor
                JOIN productos pr ON d.id_producto = pr.id_producto";
        
        $result = $this->connection->query($query);
        
        if (!$result) {
            die("Error en la consulta: " . $this->connection->error);
        }

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