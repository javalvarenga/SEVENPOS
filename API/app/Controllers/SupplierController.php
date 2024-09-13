<?php

require_once 'Models/Supplier.php';

class SupplierController {

    public function getAll() {
        $supplierModel = new Supplier();
        $supplier = $supplierModel->getAll();
        
        header('Content-Type: application/json');
        echo json_encode($supplier);
    }

    public function getById($params) {
        if (!isset($params['id']) || !is_numeric($params['id'])) {
            echo json_encode(['error' => 'ID inválido']);
            return;
        }

        $id = (int)$params['id'];
        $supplierModel = new Supplier();
        $supplier = $supplierModel->getById($id);

        header('Content-Type: application/json');
        echo json_encode($supplier ?: ['error' => 'Proveedor no encontrado']);
    }

    public function create() {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!isset($data['nombre'], $data['direccion'], $data['telefono'])) {
            echo json_encode(['error' => 'Faltan datos requeridos']);
            return;
        }

        $nombre = $data['nombre'];
        $direccion = $data['direccion'];
        $telefono = $data['telefono'];

        $supplierModel = new Supplier();
        $supplierModel->addSupplier(
            $nombre,
            $direccion,
            $telefono
        );

        header('Content-Type: application/json');
        echo json_encode(['message' => 'Proveedor creado exitosamente']);
    }

    public function delete($params) {
        if (!isset($params['id']) || !is_numeric($params['id'])) {
            echo json_encode(['error' => 'ID inválido']);
            return;
        }

        $id_proveedor = (int)$params['id'];
        $supplierModel = new Supplier();
        $result = $supplierModel->deleteSupplier($id_proveedor);

        if ($result) {
            header('Content-Type: application/json');
            echo json_encode(['message' => 'Proveedor eliminado exitosamente']);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Error al eliminar el proveedor']);
        }
    }
}
?>
