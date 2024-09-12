<?php
require_once 'models/Purchase.php';

class PurchaseController {

    // Obtener todas las compras
    public function getAll() {
        $purchaseModel = new Purchase();
        $purchases = $purchaseModel->getAllPurchases(); // Cambiado a getAllPurchases para coincidir con el modelo
        
        header('Content-Type: application/json');
        echo json_encode($purchases);
    }

    // Obtener una compra por ID
    public function getById($params) {
        if (!isset($params['id']) || !is_numeric($params['id'])) {
            echo json_encode(['error' => 'ID inválido']);
            return;
        }

        $id = (int)$params['id'];
        $purchaseModel = new Purchase();
        $purchase = $purchaseModel->getPurchaseById($id); // Cambiado a getPurchaseById para coincidir con el modelo

        header('Content-Type: application/json');
        echo json_encode($purchase ?: ['error' => 'Compra no encontrada']);
    }

    // Crear una nueva compra
    public function create() {
        $data = json_decode(file_get_contents('php://input'), true);

        // Verificar los campos requeridos
        if (!isset($data['id_compra'], $data['id_proveedor'], $data['nombre_compra'], $data['detalles'])) {
            echo json_encode(['error' => 'Faltan datos requeridos']);
            return;
        }

        if (!is_numeric($data['id_compra'])) {
            echo json_encode(['error' => 'ID de compra inválido']);
            return;
        }

        // Extraer datos
        $id_compra = $data['id_compra'];
        $id_proveedor = $data['id_proveedor'];
        $nombre_compra = $data['nombre_compra'];
        $detalles = $data['detalles']; // Detalles en formato JSON (array)

        // Llamar al modelo para insertar la compra
        $purchaseModel = new Purchase();
        $compra_id = $purchaseModel->addPurchase($id_compra, $id_proveedor, $nombre_compra, $detalles); // Llamada a addPurchase adaptada

        header('Content-Type: application/json');
        echo json_encode(['message' => 'Compra creada exitosamente', 'compra_id' => $compra_id]);
    }
}
?>