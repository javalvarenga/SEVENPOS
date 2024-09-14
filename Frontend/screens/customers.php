<?php
$title = "Clientes - SEVENPOS";

// Iniciar el buffer de salida para capturar el contenido HTML
ob_start();
?>

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

   

    /* Estilo del modal */
    .modal {
        display: none; /* Oculto por defecto */
        position: fixed; /* Fijo al viewport */
        z-index: 1; /* Asegura que esté por encima de otros elementos */
        left: 0;
        top: 0;
        width: 100%; /* Ancho completo */
        height: 100%; /* Alto completo */
        overflow: auto; /* Agrega scroll si es necesario */
        background-color: rgba(0,0,0,0.4); /* Fondo oscuro con opacidad */
    }

    /* Contenido del modal */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto; /* Centrando el modal */
        padding: 20px;
        border: 1px solid #888;
        width: 90%; /* Ancho del modal */
        max-width: 1000px; /* Ancho máximo del modal */
        border-radius: 5px; /* Bordes redondeados */
        box-sizing: border-box; /* Incluye padding y border en el ancho total */
        text-align: left; /* Alineación del texto a la izquierda */
    }

    /* Título del modal */
    .modal-content h2 {
        margin-top: 0; /* Eliminar margen superior */
        text-align: center; /* Centrar el título */
    }

    /* Estilo para el formulario dentro del modal */
    .modal-content form {
        display: flex;
        flex-direction: column;
        gap: 10px; /* Espacio entre elementos */
    }

    .modal-content label {
        font-weight: bold; /* Negrita para etiquetas */
        margin-bottom: 5px;
    }

    .modal-content input {
        width: 100%; /* Ajustar el ancho de los campos */
        padding: 8px; /* Espaciado interno */
        border-radius: 5px;
        border: 1px solid #ddd;
        box-sizing: border-box; /* Incluye padding y border en el ancho total */
    }

    /* Estilo para el botón dentro del modal */
    .modal-content button {
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #4CAF50; /* Color de fondo verde */
        color: white;
        font-size: 16px;
        cursor: pointer;
        margin-top: 10px; /* Espacio superior del botón */
        align-self: center; /* Centrar el botón */
    }

    .modal-content button:hover {
        background-color: #45a049; /* Color de fondo verde más oscuro */
    }

    /* Botón de cerrar */
    .close-button {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close-button:hover,
    .close-button:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Estilo para el botón debajo de la tabla */
    .button-container {
        text-align: center; /* Centra el contenido horizontalmente */
        margin-top: 20px; /* Espacio superior para separar del contenido anterior */
    }

    .button-container button {
        padding: 10px 20px; /* Espaciado interno del botón */
        border: none;
        border-radius: 5px;
        background-color: #4CAF50; /* Color de fondo verde */
        color: white;
        font-size: 16px;
        cursor: pointer;
    }

    .button-container button:hover {
        background-color: #45a049; /* Color de fondo verde más oscuro */
    }
    </style>
</head>

<body>
    <h1>SEVENPOS - CLIENTES</h1>
    <table id="Tabla1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>NIT</th>
                <th>CUI</th>
            </tr>
        </thead>
        <tbody>
            <!-- Los datos se llenarán aquí con JavaScript -->
        </tbody>
    </table>

    <!-- Botón para cargar solicitud -->
    <div class="button-container">
        <button id="btn-cargar-solicitud">Ver historial de >cliente<</button>
    </div>

 <!-- Modal para mostrar detalles del cliente -->
<div id="modal-cargar-solicitud" class="modal">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <h2>Historial de Compras del Cliente</h2>
        <form id="form-cargar-solicitud">
            <label for="cliente-id">ID Cliente:</label>
            <input type="text" id="cliente-id" name="cliente-id" required>
            <button type="submit">Mostrar Historial</button>
        </form>
        <div id="historial-container">
            <!-- El historial de compras se mostrará aquí -->
        </div>
    </div>
</div>


    <script type="module" src="../js/customers.js"></script>

<?php
// IMPORTANTE PARA USAR EL LAYOUT Asignar el contenido capturado a la variable $content
$content = ob_get_clean();

// Incluir el layout
include 'layout.php';
?>