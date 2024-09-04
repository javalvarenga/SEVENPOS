<?php
require_once 'Models/Customer.php';

class CustomerController {
    public function getAll() {
        $customerModel = new Customer();
        $customers = $customerModel->getAll();
        
        header('Content-Type: application/json');
        echo json_encode($customers);
    }

    public function getById($id) {
        $customerModel = new Customer();
        $customer = $customerModel->getById($id);
        
        header('Content-Type: application/json');
        echo json_encode($customer);
    }
}