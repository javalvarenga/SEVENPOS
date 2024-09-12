<?php
$title = "Pagos - SEVENPOS";

// Iniciar el buffer de salida para capturar el contenido HTML
ob_start();
?>

<h1> SEVENPOS - Pagos</h1>
<?php
// IMPORTANTE PARA USAR EL LAYOUT Asignar el contenido capturado a la variable $content
$content = ob_get_clean();

// Incluir el layout
include 'layout.php';
?>