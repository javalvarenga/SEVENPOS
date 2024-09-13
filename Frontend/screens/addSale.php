<?php
$title = "Ventas - SEVENPOS";

// Iniciar el buffer de salida para capturar el contenido HTML
ob_start();
?>

<h1> SEVENPOS - Nueva venta</h1>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <style>

        form{
            padding-left: 180px;
        }
        
        input,option {
            width: 80%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            padding: 8px;
            display: flex;
            justify-self: center;
        }

        select{
            width: 83.5%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            padding: 8px;
            display: flex;
            justify-self: center;
        }

        div{
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
<div>
<i class="fa-solid fa-plus"></i>
</div>
    
<form id="ventaForm">
        <label for="nombre">Nombre del Cliente:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br><br>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required><br><br>

        <label for="nit">NIT:</label>
        <input type="text" id="nit" name="nit" required><br><br>

        <label for="cui">CUI:</label>
        <input type="text" id="cui" name="cui" required><br><br>

        <!--<label for="id_empleado">ID Empleado:</label>
        <input type="number" id="id_empleado" name="id_empleado" required><br><br>-->

        <label for="tipo_pago">Tipo de Pago:</label>
        <input type="text" id="tipo_pago" name="tipo_pago" required><br><br>

        <label for="descuento">Descuento:</label>
        <input type="number" step="0.01" id="descuento" name="descuento" required><br><br>

        <h3 style="grid-column: span 2;">Detalles de los Productos</h3>
        <div id="productos">
            <div class="producto">
                <label for="producto_select">Producto:</label>
                <select  name="id_producto" class="producto_select" required>
                    <option value="">Seleccione un producto</option>
                </select>

                <!--<label for="id_producto">ID del Producto:</label>
                <input type="number" id="id_producto" name="id_producto" required>-->
                
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" required>
            </div>
        </div>
        <button type="button" id="addProducto">Agregar Producto</button><br><br>

        <input type="submit" value="Registrar Venta">
    </form>

    <div id="result"></div>

    <script type="module" src="../js/sales.js"></script>






<?php
// IMPORTANTE PARA USAR EL LAYOUT Asignar el contenido capturado a la variable $content
$content = ob_get_clean();

// Incluir el layout
include 'layout.php';
?>