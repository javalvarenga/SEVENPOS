<?php
require_once 'Models/Product.php';

class ProductController {
    public function getAll() {
        $productModel = new Product();
        $product = $productModel->getAll();

        // Renderizar la vista con la lista de ventas
        require 'productLista.php';
    }

    public function getById($id_product) {
        $productModel = new Product();
        $product = $productModel->getById($id_product);

        // Renderizar la vista con los detalles de la venta
        require 'productDetail.php';
    }
}