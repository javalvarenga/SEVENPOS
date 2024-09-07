<?php require_once 'db/Conexion.php'; // Asegúrate de que la ruta es correcta

class Product {
    private $db;
    private $connection;

    public function __construct() {
        // Crear una instancia de la clase Database y conectarse a la base de datos
        $this->db = new Database();
        $this->connection = $this->db->connect();
    }

    public function getAll() {
        $result = $this->connection->query("SELECT id_product, nombre, precio, unidasdes FROM productos");
        $product = [];

        while ($row = $result->fetch_assoc()) {
            $product[] = $row;
        }

        return $product;
    }
    public function getById($id_producto) {
        $stmt = $this->connection->prepare("SELECT id_producto, nombre, precio, unidasdes FROM productos WHERE id_producto = ?");
        $stmt->bind_param('i', $id_producto);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        $stmt->close();

        return $product;
    }

    public function __destruct() {
        // Desconectar de la base de datos al destruir la instancia de Sales
        $this->db->disconnect();
    }
}
?>

