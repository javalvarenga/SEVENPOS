<?php
class ComponentModel {
    public function getComponentContent($componentName) {
        switch ($componentName) {
            case 'componentA':
                return __DIR__ . '/../vistas/componentA.php'; 
            case 'componentB':
                return __DIR__ . '/../vistas/componentB.php';
            default:
                return null;
        }
    }
}
?>