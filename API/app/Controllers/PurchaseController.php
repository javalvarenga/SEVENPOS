<?php
require_once 'Models/Purchase.php';

class PurchaseController {

    public function getAll() {
        $purchaseModel = new Purchase();
    $purchases = $purchaseModel->getAllPurchases();

    if (!$purchases) {
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(["error" => "No se pudieron obtener las compras"]);
        return;
    }

    $formattedPurchases = array_map(function($purchase) {
        return [
            'id_compra' => $purchase['id_compra'] ?? null,
            'fecha' => $purchase['fecha'] ?? null,
            'proveedor_nombre' => $purchase['proveedor_nombre'] ?? 'Desconocido',
            'id_producto' => $purchase['id_producto'] ?? null,
            'producto_nombre' => $purchase['producto_nombre'] ?? 'Desconocido',
            'cantidad' => $purchase['cantidad'] ?? 0,
            'subtotal' => $purchase['subtotal'] ?? 0
        ];
    }, $purchases);

    // Asegura de que el contenido es JSON
    header('Content-Type: application/json');
    echo json_encode($formattedPurchases);
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
    
        if (!isset($data['id_proveedor'], $data['nombre_compra'], $data['fecha'], $data['detalles'])) {
            echo json_encode(['error' => 'Faltan datos requeridos']);
            return;
        }
    
        if (!is_array($data['detalles'])) {
            echo json_encode(['error' => 'Detalles deben ser un array']);
            return;
        }
    
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