<?php
require_once 'Models/Sales.php';

class SalesController {
    public function getAll() {
        $ventaModel = new Sales();
        $ventas = $ventaModel->getAll();

        // Renderizar la vista con la lista de ventas
        require 'ventaList.php';
    }

    public function getById($id) {
        $ventaModel = new Sales();
        $venta = $ventaModel->getById($id);

        // Renderizar la vista con los detalles de la venta
        require 'ventaDetail.php';
    }
}