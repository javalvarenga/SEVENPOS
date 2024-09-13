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
        $result = $this->connection->query("SELECT id_producto, nombre, precio, unidades FROM productos");
        $product = [];

        while ($row = $result->fetch_assoc()) {
            $product[] = $row;
        }

        return $product;
    }
    public function getById($id){
        $stmt = $this->connection->prepare("CALL ObtenerProducto(?)");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        $stmt->close();

        return $product;
    }


   public function addProduct($nombre, $precio, $unidades){
    // Preparar la llamada al procedimiento almacenado
    $stmt = $this->connection->prepare("CALL InsertarProducto(?, ?, ?)");

    // Vincular los parámetros al procedimiento almacenado (eliminar el id_producto)
    $stmt->bind_param('sdi', $nombre, $precio, $unidades);

    // Ejecutar el procedimiento almacenado
    $stmt->execute();

    // Cerrar la declaración
    $stmt->close();

    // Devolver mensaje de registro exitoso
    return "Registro exitoso";
}

public function deleteProduct($id_producto) {
    // Preparar la llamada al procedimiento almacenado
    $stmt = $this->connection->prepare("CALL EliminarProducto(?)");

    // Vincular el parámetro al procedimiento almacenado
    $stmt->bind_param('i', $id_producto);

    // Ejecutar el procedimiento almacenado
    $stmt->execute();

    // Verificar si la eliminación fue exitosa
    if ($stmt->affected_rows > 0) {
        // Si se eliminaron filas, el producto fue eliminado exitosamente
        $mensaje = "Producto eliminado exitosamente";
    } else {
        // Si no se eliminaron filas, no se encontró el producto
        $mensaje = "No se encontró el producto con el ID proporcionado";
    }

    // Cerrar la declaración
    $stmt->close();

    // Devolver el mensaje de resultado
    return $mensaje;
}

public function updateProduct( $nombre, $precio, $unidades, $id_producto,) {
    // Preparar la llamada al procedimiento almacenado
    $stmt = $this->connection->prepare("CALL ActualizarProducto(?, ?, ?, ?)");

    // Vincular los parámetros al procedimiento almacenado
    $stmt->bind_param('sdii', $nombre, $precio, $unidades, $id_producto);

    // Ejecutar el procedimiento almacenado
    $stmt->execute();

    // Verificar si la actualización fue exitosa
    // Obtener el número de filas afectadas
    $affectedRows = $stmt->affected_rows;

    // Cerrar la declaración
    $stmt->close();

    // Devolver el mensaje de resultado
    if ($affectedRows > 0) {
        $mensaje = "Producto actualizado exitosamente";
    } else {
        $mensaje = "No se encontró el producto con el ID proporcionado o no se realizaron cambios";
    }

    return $mensaje;
}




    
    public function __destruct() {
        // Desconectar de la base de datos al destruir la instancia de Sales
        $this->db->disconnect();
    }
}
