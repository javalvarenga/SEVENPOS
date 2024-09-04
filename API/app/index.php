<?php
require 'Controllers/SalesController.php';

$controller = new SalesController();

if (isset($_GET['action']) && $_GET['action'] === 'view') {
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $controller->getById($id);
} else {
    $controller->getAll();
}