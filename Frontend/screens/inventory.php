<?php
$title = "INVENTARIO - SEVENPOS";

// Iniciar el buffer de salida para capturar el contenido HTML
ob_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

    <h1> SEVENPOS - INVENTARIO</h1>
    <table id="MyTable">
        <thead>
            <tr>
                <th>ID Producto</th>
                <th>Nombre</th>
                <th>Precio Unitario</th>
                <th>Unidades</th>
            </tr>
        </thead>
        <tbody>
            <!-- Los datos se llenarán aquí con JavaScript -->
        </tbody>
    </table>

    <script type="module" src="../js/products.js"></script>


<?php
// IMPORTANTE PARA USAR EL LAYOUT Asignar el contenido capturado a la variable $content
$content = ob_get_clean();

// Incluir el layout
include 'layout.php';
?>