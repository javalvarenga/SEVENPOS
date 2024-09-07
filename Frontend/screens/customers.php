<?php
// Customers.php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    </style>
</head>
<body>
   <h1> SEVENPOS - Customers</h1>
   <table id="customersTable">
       <thead>
           <tr>
               <th>ID</th>
               <th>Nombre</th>
               <th>Dirección</th>
               <th>Teléfono</th>
           </tr>
       </thead>
       <tbody>
           <!-- Los datos se llenarán aquí con JavaScript -->
       </tbody>
   </table>

   <script>
       document.addEventListener('DOMContentLoaded', () => {
           fetch('http://localhost:8000/customer/getAll')
               .then(response => response.json())
               .then(data => {
                   const tableBody = document.querySelector('#customersTable tbody');
                   data.forEach(customer => {
                       const row = document.createElement('tr');
                       row.innerHTML = `
                           <td>${customer.id_cliente}</td>
                           <td>${customer.nombre}</td>
                           <td>${customer.direccion}</td>
                           <td>${customer.telefono}</td>
                       `;
                       tableBody.appendChild(row);
                   });
               })
               .catch(error => console.error('Error:', error));
       });
   </script>
</body>
</html>
