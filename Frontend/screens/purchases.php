<?php
$title = "Compras - SEVENPOS";

// Iniciar el buffer de salida para capturar el contenido HTML
ob_start();
?>

<h1>SEVENPOS - Resumen de Compras</h1>
<!------------------------------------------------------>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

   
   

        button:hover {
            background-color: #218838;
        }

        button:active {
            transform: scale(0.95);
        }

        .button-container {
            text-align: right;
            margin-bottom: 10px;
        }
        .button-container button {
            width: 10%;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #28a745;
            color: white;
            cursor: pointer;
            transition: transform 0.2s ease, background-color 0.3s ease;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="button-container">
        <button onclick="window.location.href='addPurchase'">Nueva compra</button>
    </div>    

    <table id="comprasTable">
        <thead>
            <tr>
                <th>Compra</th>
                <th>Fecha</th>
                <th>Proveedor</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <!-- Los datos se llenarán aquí con JavaScript -->
        </tbody>
    </table>

    <script type="module" src="../js/purchasemain.js"></script>

<?php
// IMPORTANTE PARA USAR EL LAYOUT Asignar el contenido capturado a la variable $content
$content = ob_get_clean();

// Incluir el layout
include 'layout.php';
?>