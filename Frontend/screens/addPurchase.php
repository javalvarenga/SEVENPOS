<?php
$title = "Compras - SEVENPOS";

// Iniciar el buffer de salida para capturar el contenido HTML
ob_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras</title>
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

        form {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        button, input[type="submit"] {
            width: 50%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover, input[type="submit"]:hover {
            background-color: #45a049;
        }

        .producto {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }

        .producto label {
            width: 100px;
        }

        .producto input, .producto select {
            flex-grow: 1;
        }

    </style>
</head>

<body>
    <h1>SEVENPOS - Compras</h1>

    <button onclick="window.location.href='purchases'">Volver</button>
    <button onclick="window.location.href='suppliers'">Proveedores</button>

    <form id="purchaseForm">
        <label for="proveedor_select">Proveedor:</label>
        <select id="proveedor_select" name="id_proveedor" class="proveedor_select" required>
            <option value="">Seleccione un proveedor</option>
        </select><br>

        <label for="nombre_compra">Nombre de la Compra:</label>
        <input type="text" id="nombre_compra" name="nombre_compra" required><br>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br>

        <h3>Detalles de los Productos</h3>

        <div id="productos">
            <div class="producto">
                <label for="producto_select">Producto:</label>
                <select name="id_producto" class="producto_select" required>
                    <option value="">Seleccione un producto</option>
                </select>

                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" class="cantidad" required>

                <label for="precio">Precio:</label>
                <input type="number" name="precio" class="precio" step="0.01" required>

                <label for="subtotal">Subtotal:</label>
                <input type="number" name="subtotal" class="subtotal" step="0.01" required readonly>   
            </div>
        </div>

        <button type="button" id="addProducto">Agregar Producto</button><br><br>

        <input type="submit" value="Registrar Compra">

    </div> 
    </form>

    <div id="result"></div>

    <script type="module" src="../js/purchase.js"></script>

<?php
// IMPORTANTE PARA USAR EL LAYOUT: Asignar el contenido capturado a la variable $content
$content = ob_get_clean();

// Incluir el layout
include 'layout.php';
?>