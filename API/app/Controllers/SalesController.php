<?php
require_once 'Models/Sales.php';

class SalesController {

    public function getAll() {
        $facturaModel = new Sales();
        $facturas = $facturaModel->getAll();
        
        // Devolver el resultado en formato JSON
        header('Content-Type: application/json');
        echo json_encode($facturas);
    }

    public function getById($params) {
        // Verificar si el parámetro 'id' está presente en la URL
        if (!isset($params['id']) || !is_numeric($params['id'])) {
            echo json_encode(['error' => 'ID inválido']);
            return;
        }

        $id = (int)$params['id'];
        $facturaModel = new Sales();
        $factura = $facturaModel->getById($id);

        // Devolver el resultado en formato JSON
        header('Content-Type: application/json');
        echo json_encode($factura);
    }

    public function create() {
        // Leer el cuerpo de la solicitud y decodificar el JSON
        $data = json_decode(file_get_contents('php://input'), true);

        // Validar que los datos requeridos están presentes
        if (!isset($data['nombre'],$data['direccion'],$data['telefono'],$data['correo'],$data['nit'],$data['cui'], $data['id_empleado'], $data['tipo_pago'], $data['descuento'], $data['detalles'])) {
            echo json_encode(['error' => 'Faltan datos requeridos']);
            return;
        }

        $VentaModel = new Sales();
        $ven = $VentaModel->addVenta(
            $data['nombre'],
            $data['direccion'],
            $data['telefono'],
            $data['correo'],
            $data['nit'],
            $data['cui'],
            $data['id_empleado'],
            $data['tipo_pago'],
            $data['descuento'],
            $data['detalles']
        );

        // Devolver el ID de la factura creada en formato JSON
        header('Content-Type: application/json');
        echo json_encode(['Venta' => $ven]);
    }
}
?>
