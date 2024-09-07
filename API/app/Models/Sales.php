<?php
require_once 'db/Conexion.php'; 

class Sales {
    private $db;
    private $connection;

    public function __construct() {
        // Crear una instancia de la clase Database y conectarse a la base de datos
        $this->db = new Database();
        $this->connection = $this->db->connect();
    }

    public function getAll() {
        $result = $this->connection->query("SELECT * FROM facturas");
        $facturas = [];

        while ($row = $result->fetch_assoc()) {
            $facturas[] = $row;
        }

        return $facturas;
    }

    public function getById($id) {
        $stmt = $this->connection->prepare("SELECT * FROM facturas WHERE id_empleado = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $factura = $result->fetch_assoc();
        $stmt->close();

        return $factura;
    }

    public function addVenta($nombre, $direccion, $telefono, $correo, $nit, $cui, $id_empleado, $tipo_pago, $descuento, $detalles) {
    // Configurar la zona horaria a Guatemala
    date_default_timezone_set('America/Guatemala');

    // Obtener la fecha y hora actuales
    $fecha = date('Y-m-d H:i:s');

    // Convertir el array de detalles a JSON
    $detalles_json = json_encode($detalles);

    // Preparar la llamada al procedimiento almacenado
    $stmt = $this->connection->prepare("CALL Insertarclienteventa(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Vincular los parámetros al procedimiento almacenado
    $stmt->bind_param('ssisiiissds', $nombre, $direccion, $telefono, $correo, $nit, $cui, $id_empleado, $fecha, $tipo_pago, $descuento, $detalles_json);

    // Ejecutar el procedimiento almacenado
    $stmt->execute();

    // Obtener el resultado (el ID de la factura insertada)
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $venta_id = $row['venta_id'];

    $stmt->close();

    return $venta_id;
}

    

    public function __destruct() {
        $this->db->disconnect();
    }
}
?>
