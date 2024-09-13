<?php
$title = "Compras - SEVENPOS";

// Iniciar el buffer de salida para capturar el contenido HTML
ob_start();
?>

<h1> SEVENPOS - Compras</h1>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras</title>

    <style>
        form {
            padding-left: 90px;
        }

        input, option {
            width: 80%;
            border: 1px solid #ddd;
            padding: 8px;
            display: flex;
            justify-self: center;
        }

        select {
            width: 83.5%;
            border: 1px solid #ddd;
            padding: 8px;
            display: flex;
            justify-self: center;
        }

        div {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        button, input[type="submit"] {
            width: 83%;
            padding: 10px;
            border: none;
            background-color: #28a745;
            color: white;
            cursor: pointer;
            transition: transform 0.2s ease, background-color 0.3s ease;
        }

        button:hover, input[type="submit"]:hover {
            background-color: #218838;
        }

        button:active, input[type="submit"]:active {
            transform: scale(0.95);
        }
    </style>
</head>

<body>
<form id="purchaseForm">
    <label for="proveedor_select">Proveedor:</label>
    <select id="proveedor_select" name="id_proveedor" class="proveedor_select" required>
        <option value="">Seleccione un proveedor</option>
    </select><br><br>

    <label for="nombre_compra">Nombre de la Compra:</label>
    <input type="text" id="nombre_compra" name="nombre_compra" required><br><br>

    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="fecha" required><br><br>

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
</form>

    <div id="result"></div>

    <script type="module" src="../js/purchase.js"></script>
</body>


<?php
// IMPORTANTE PARA USAR EL LAYOUT Asignar el contenido capturado a la variable $content
$content = ob_get_clean();

// Incluir el layout
include 'layout.php';
?>