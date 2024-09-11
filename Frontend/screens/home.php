<?php
$title = "Inicio - SEVENPOS";

// Iniciar el buffer de salida para capturar el contenido HTML
ob_start();
?>

<h1> SEVENPOS</h1>

<div
  role="alertdialog"
  aria-labelledby="tituloDialogo1"
  aria-describedby="descrDialogo1">
  <div role="document" tabindex="0">
    <h2 id="tituloDialogo1">Tu sesión esta apunto de expirar</h2>
    <p id="descrDialogo1">Para extender tu sesión de clic en el botón OK</p>
    <button>OK</button>
  </div>
</div>

<?php
// IMPORTANTE PARA USAR EL LAYOUT Asignar el contenido capturado a la variable $content
$content = ob_get_clean();

// Incluir el layout
include 'layout.php';
?>