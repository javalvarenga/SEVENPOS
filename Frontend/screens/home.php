<?php
$title = "Inicio - SEVENPOS";

// Iniciar el buffer de salida para capturar el contenido HTML
ob_start();
?>

<h1> SEVENPOS</h1>
<div id="chart"></div>

<?php
// IMPORTANTE PARA USAR EL LAYOUT Asignar el contenido capturado a la variable $content
$content = ob_get_clean();

// Incluir el layout
include 'layout.php';
?>
<script>
  var options = {
  chart: {
    type: 'bar',
    height: 350,
  },
  series: [{
    name: 'sales',
    data: [10, 20, 30, 10, 50, 60, 70],
    color: '#000000'
  }],
  xaxis: {
    categories: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado']
  }
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
</script>