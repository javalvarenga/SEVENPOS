<?php
require_once 'Models/Purchase.php';

class PurchaseController {

    public function getAll() {
        $purchaseModel = new Purchase();
        $purchases = $purchaseModel->getAll();
        
        header('Content-Type: application/json');
        echo json_encode($purchases);
    }

    public function getById($params) {
        if (!isset($params['id']) || !is_numeric($params['id'])) {
            echo json_encode(['error' => 'ID inválido']);
            return;
        }

        $id = (int)$params['id'];
        $purchaseModel = new Purchase();
        $purchase = $purchaseModel->getById($id);

        header('Content-Type: application/json');
        echo json_encode($purchase ?: ['error' => 'Compra no encontrada']);
    }

    public function create() {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!isset($data['id_proveedor'], $data['nombre_compra'], $data['fecha'], $data['total'])) {
            echo json_encode(['error' => 'Faltan datos requeridos']);
            return;
        }

        $purchaseModel = new Purchase();
        $purchaseModel->addPurchase(
            $data['id_proveedor'],
            $data['nombre_compra'],
            $data['fecha'],
            $data['total']
        );

        header('Content-Type: application/json');
        echo json_encode(['message' => 'Compra creada exitosamente']);
    }
}
?>

