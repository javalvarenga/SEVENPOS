<?php

require_once 'db/Conexion.php';

class Supplier {

    private $db;
    private $connection;

    public function __construct() {
        $this->db = new Database();
        $this->connection = $this->db->connect();
    }

    public function getAll() {
        $result = $this->connection->query("SELECT * FROM proveedores");
        $supplier = [];

        while ($row = $result->fetch_assoc()) {
            $supplier[] = $row;
        }

        return $supplier;
    }

    public function getById($id) {
        $stmt = $this->connection->prepare("CALL BuscarProveedor(?)");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $supplier = $result->fetch_assoc();
        $stmt->close();

        return $supplier ?: null;
    }

    public function addSupplier($nombre, $direccion, $telefono) {
        $stmt = $this->connection->prepare("CALL InsertarProveedor(?, ?, ?)");
        $stmt->bind_param('sss', $nombre, $direccion, $telefono);
        $stmt->execute();
        $stmt->close();

        return true;
    }

    public function __destruct() {
        $this->db->disconnect();
    }
}
?>

?>
