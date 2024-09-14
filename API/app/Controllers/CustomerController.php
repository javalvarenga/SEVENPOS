<?php
require_once 'Models/Customer.php';

class CustomerController {

    public function getAll() {
        $CustomerModel = new customer();
        $customers = $CustomerModel->getAll();
        
        // Devolver el resultado en formato JSON
        header('Content-Type: application/json');
        echo json_encode($customers);
    }

    public function getHistorialid($params) {
        // Verificar si el parámetro 'id' está presente en la URL
        if (!isset($params['id']) || !is_numeric($params['id'])) {
            echo json_encode(['error' => 'ID inválido']);
            return;
        }

        $id = (int)$params['id'];
        $CustomerModel = new Customer(); // Asegúrate de que el nombre de la clase esté capitalizado correctamente
        $history = $CustomerModel->getHistorialid($id); // Llama al método getHistoryId

        // Devolver el resultado en formato JSON
        header('Content-Type: application/json');
        echo json_encode($history);
    }
}
?>