<?php
$title = "INVENTARIO - SEVENPOS";

// Iniciar el buffer de salida para capturar el contenido HTML
ob_start();
?>

<div class="home-container">

  <div class="indicators">
  <div class="card">
    <h2>Ventas Totales del Día</h2>
    <p id="ventasTotales">Q0.00</p>
  </div>

  <div class="card">
    <h2>Número de Transacciones del Día</h2>
    <p id="numTransacciones">0</p>
  </div>

  <div class="card">
    <h2>Producto Más Vendido</h2>
    <p id="productoMasVendido">-</p>
    <p id="cantidadVendida">(0 vendidos)</p>
  </div>
  </div>
  <div id="chart"></div>
</div>



<script type="module" src="../js/home.js"></script>

<?php
// IMPORTANTE PARA USAR EL LAYOUT Asignar el contenido capturado a la variable $content
$content = ob_get_clean();

// Incluir el layout
include 'layout.php';
?>