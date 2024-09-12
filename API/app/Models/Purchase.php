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
    public function addPurchase($id_compra, $id_proveedor, $nombre_compra, $detalles) {
        // Configurar la zona horaria a Guatemala
        date_default_timezone_set('America/Guatemala');

        // Obtener la fecha actual
        $fecha = date('Y-m-d');

        // Convertir el array de detalles a JSON
        $detalles_json = json_encode($detalles);

        // Preparar la llamada al procedimiento almacenado
        $stmt = $this->connection->prepare("CALL InsertarCompra(?, ?, ?, ?, ?, ?, ?, ?)");

        // Aquí los parámetros corresponden a los que espera el SP: id_compra, id_proveedor, nombre_compra, id_producto, cantidad, subtotal, fecha, detalles en JSON
        // Asignamos valores predeterminados para id_producto, cantidad y subtotal que serán procesados en el SP desde el JSON
        $id_producto = 0;  // Valor predeterminado, será extraído del JSON en el SP
        $cantidad = 0;     // Valor predeterminado, será extraído del JSON en el SP
        $subtotal = 0.00;  // Valor predeterminado, será extraído del JSON en el SP

        // Vincular los parámetros al procedimiento almacenado
        $stmt->bind_param('iissdiss', $id_compra, $id_proveedor, $nombre_compra, $id_producto, $cantidad, $subtotal, $fecha, $detalles_json);

        // Ejecutar el procedimiento almacenado
        $stmt->execute();

        // Obtener el resultado (el ID de la compra insertada)
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $compra_id = $row['compra_id'];

        // Cerrar la declaración
        $stmt->close();

        // Retornar el ID de la compra
        return $compra_id;
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
