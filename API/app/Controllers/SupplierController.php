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

        $supplierModel = new Supplier();
        $supplierModel->addSupplier(
            $data['nombre'],
            $data['direccion'],
            $data['telefono']
        );

        header('Content-Type: application/json');
        echo json_encode(['message' => 'Proveedor creado exitosamente']);
    }
}
?>
