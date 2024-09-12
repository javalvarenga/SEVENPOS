<?php
require_once 'Models/Purchase.php';

class PurchaseController {

    public function getAll() {
        $purchaseModel = new Purchase();
        $purchases = $purchaseModel->getAllPurchases();
        
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
        $purchase = $purchaseModel->getPurchaseById($id);

        header('Content-Type: application/json');
        echo json_encode($purchase ?: ['error' => 'Compra no encontrada']);
    }

    public function create() {
        $data = json_decode(file_get_contents('php://input'), true);
    
        // Validar que todos los campos requeridos estén presentes
        if (!isset($data['id_proveedor'], $data['nombre_compra'], $data['fecha'], $data['detalles'])) {
            echo json_encode(['error' => 'Faltan datos requeridos']);
            return;
        }
    
        // Verificar que detalles sea un array
        if (!is_array($data['detalles'])) {
            echo json_encode(['error' => 'Detalles deben ser un array']);
            return;
        }
    
        // Crear el modelo y llamar a la función addPurchase
        $purchaseModel = new Purchase();
        $compra_id = $purchaseModel->addPurchase(
            $data['id_proveedor'],
            $data['nombre_compra'],
            $data['fecha'],
            $data['detalles']
        );
    
        if ($compra_id) {
            header('Content-Type: application/json');
            echo json_encode(['compra_id' => $compra_id, 'message' => 'Compra creada exitosamente']);
        } else {
            echo json_encode(['error' => 'Error al crear la compra']);
        }
    }
}
?>