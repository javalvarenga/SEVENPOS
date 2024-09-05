<?php
require_once 'Models/Customer.php';

class CustomerController {
    public function getAll() {
        $customerModel = new Customer();
        $customers = $customerModel->getAll();
        
        header('Content-Type: application/json');
        echo json_encode($customers);
    }

    public function getById($params) {
        echo json_encode($params);
        /* istanciar el modelo */
        $customerModel = new Customer();
        /* recibir los paremetros de la URL */
        if (!isset($params['id']) || !is_numeric($params['id'])) {
            echo 'ID inválido';
            return;
        }

        $id = (int)$params['id'];
        // Lógica para obtener el cliente por ID (ejemplo con una base de datos)
        $customer = $customerModel->getById($id);

        // Mostrar el cliente en formato JSON (ejemplo)
        header('Content-Type: application/json');
        echo json_encode($customer);
    }
}