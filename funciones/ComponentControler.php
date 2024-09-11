<?php
require_once __DIR__ . '/ComponentModal.php';

class ComponentController {
    private $model;

    public function __construct() {
        $this->model = new ComponentModel();
    }

    public function handleRequest() {
        $componentName = isset($_POST['component']) ? $_POST['component'] : '';
        $componentFile = $this->model->getComponentContent($componentName);

        if ($componentFile) {
            include $componentFile;
        } else {
            echo '<p>Selecciona un componente para ver su contenido.</p>';
        }
    }
}
?>

