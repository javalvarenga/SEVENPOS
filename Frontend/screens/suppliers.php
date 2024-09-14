<?php
$title = "Proveedores - SEVENPOS";

// Iniciar el buffer de salida para capturar el contenido HTML
ob_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f4f4f4;
        }

        /* Estilo del modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 90%;
            max-width: 500px;
            border-radius: 5px;
            box-sizing: border-box;
            text-align: left;
        }

        .modal-content h2 {
            margin-top: 0;
            text-align: center;
        }

        .modal-content form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .modal-content input {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .modal-content button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
            align-self: center;
        }

        .modal-content button:hover {
            background-color: #45a049;
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        button:hover, input[type="submit"]:hover {
            background-color: #45a049;
            
        }

        .close-button {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-button:hover, .close-button:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>SEVENPOS - Proveedores</h1>
    <table id="MyTable">
        <thead>
            <tr>
                <th>ID Proveedor</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <div id="modal-nuevo-proveedor" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h2>Agregar Nuevo Proveedor</h2>
            <form id="form-nuevo-proveedor">

                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" required>

                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" required>

                <button type="submit">Registrar Proveedor</button>
            </form>
        </div>
    </div>
    
    <script type="module" src="../js/suppliers.js"></script>
<?php

// IMPORTANTE PARA USAR EL LAYOUT Asignar el contenido capturado a la variable $content
$content = ob_get_clean();

// Incluir el layout
include 'layout.php';
?>