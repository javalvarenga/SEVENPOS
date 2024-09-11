<?php
require_once 'Models/Product.php';

class ProductController {
    public function getAll() {
        $productModel = new Product();
        $product = $productModel->getAll();

        header('Content-Type: application/json');
        echo json_encode($product);
    }

    public function getById($params) {
        // Verificar si el parámetro 'id' está presente en la URL
        if (!isset($params['id']) || !is_numeric($params['id'])) {
            echo json_encode(['error' => 'ID inválido']);
            return;
        }

        $id = (int)$params['id'];
        $productModel = new Product();
        $product = $productModel->getById($id);

        // Devolver el resultado en formato JSON
        header('Content-Type: application/json');
        echo json_encode($product);
    }

    public function create(){
        // Leer el cuerpo de la solicitud y decodificar el JSON
        $data = json_decode(file_get_contents('php://input'), true);

        // Validar que los datos requeridos están presentes
        if (!isset($data['id_producto'],$data['nombre'],$data['precio'],$data['unidades'])) {
            echo json_encode(['error' => 'Faltan datos requeridos']);
            return;
        }

        $ProductModel = new Product();
        $pro = $ProductModel->addProduct(
            $data['id_producto'],
            $data['nombre'],
            $data['precio'],
            $data['unidades'],
        );

        // Devolver el ID de la factura creada en formato JSON
        header('Content-Type: application/json');
        echo json_encode(['Producto' => $pro]);
    }
    
    
    public function delete() {
        // Leer el cuerpo de la solicitud y decodificar el JSON
        $data = json_decode(file_get_contents('php://input'), true);
    
        // Validar que el ID del producto esté presente
        if (!isset($data['id_producto'])) {
            echo json_encode(['error' => 'Falta el ID del producto']);
            return;
        }
    
        $ProductModel = new Product();
        $mensaje = $ProductModel->deleteProduct(
            $data['id_producto']
        );
    
        // Devolver el mensaje en formato JSON
        header('Content-Type: application/json');
        echo json_encode(['mensaje' => $mensaje]);
    }
    
    public function update() {
        // Leer el cuerpo de la solicitud y decodificar el JSON
        $data = json_decode(file_get_contents('php://input'), true);
    
        // Validar que los datos requeridos estén presentes
        if (!isset($data['id_producto'], $data['nombre'], $data['precio'], $data['unidades'])) {
            echo json_encode(['error' => 'Faltan datos requeridos']);
            return;
        }
    
        $ProductModel = new Product();
        $mensaje = $ProductModel->updateProduct(
            $data['id_producto'],
            $data['nombre'],
            $data['precio'],
            $data['unidades']
        );
    
        // Devolver el mensaje en formato JSON
        header('Content-Type: application/json');
        echo json_encode(['mensaje' => $mensaje]);
    }
    
    
}

