<?php
$title = "Ventas - SEVENPOS";

// Iniciar el buffer de salida para capturar el contenido HTML
ob_start();
?>


<h1> SEVENPOS - Ventas</h1>
<!------------------------------------------------------>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
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

   

        form > div{
            padding-top: 10px;
            padding-bottom: 10px;
           
        }
        

        button, input[type="submit"] {
            width: 83%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #28a745;
            color: white;
            cursor: pointer;
            transition: transform 0.2s ease, background-color 0.3s ease;
            margin-bottom: 10px;
        }

        button:hover{
            background-color: #218838;
        }

        button:active{
            transform: scale(0.95);
        }

        .button-container {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            text-align: right;
            margin-bottom: 10px;
        }
        .button-container button{
            max-width: 200px;
        }

    </style>
</head>
    <div class="button-container">
        <button onclick="window.location.href='addSale'">Nueva venta</button>
    </div>    
    
    <table id="facturasTable">
        <thead>
            <tr>
                <th>Venta</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Productos</th>
                <th>Cantidad de productos</th>
                <th>Descuento</th>
                <th>total</th>
            </tr>
        </thead>
        <tbody>
            <!-- Los datos se llenarán aquí con JavaScript -->
        </tbody>
    </table>

    <script type="module" src="../js/salesMain.js"></script>












<!------------------------------------------------------>
<?php
// IMPORTANTE PARA USAR EL LAYOUT Asignar el contenido capturado a la variable $content
$content = ob_get_clean();

// Incluir el layout
include 'layout.php';
?>