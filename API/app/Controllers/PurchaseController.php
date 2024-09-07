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
        /* Verificar los parámetros */
        if (!isset($params['id']) || !is_numeric($params['id'])) {
            echo json_encode(['error' => 'ID inválido']);
            return;
        }

        /* Instanciar el modelo */
        $purchaseModel = new Purchase();
        $id = (int)$params['id'];

        /* Obtener la compra por ID */
        $purchase = $purchaseModel->getById($id);

        /* Mostrar el resultado en formato JSON */
        header('Content-Type: application/json');
        echo json_encode($purchase ?: ['error' => 'Compra no encontrada']);
    }
}
