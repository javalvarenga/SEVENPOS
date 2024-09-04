<?php
class Customer {
    public function getAll() {
        // Simulamos datos de la base de datos
        return [
            ['id' => 1, 'name' => 'Juan Pérez'],
            ['id' => 2, 'name' => 'María García'],
            ['id' => 3, 'name' => 'Carlos López'],
            ['id' => 4, 'name' => 'Hector López']
        ];
    }

    public function getById($id) {
        // obtener un cliente por id
        $customers = $this->getAll();
        foreach ($customers as $customer) {
            if ($customer['id'] == $id) {
                return $customer;
            }
        }
        return null;
    }
}