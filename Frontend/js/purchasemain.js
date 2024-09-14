import {
    API_URL
} from '../utils/constants.js';

document.addEventListener('DOMContentLoaded', function () {
    fetch(API_URL + 'Purchase/getAll')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('Datos recibidos:', data);
        let comprasTableBody = document.querySelector('#comprasTable tbody');
        comprasTableBody.innerHTML = ''; 

        data.forEach(compra => {
            let row = document.createElement('tr');

            // Añadir las celdas
            let compraCell = document.createElement('td');
            compraCell.textContent = compra.id_compra || 'N/A'; 
            row.appendChild(compraCell);

            let fechaCell = document.createElement('td');
            fechaCell.textContent = compra.fecha || 'N/A';
            row.appendChild(fechaCell);

            let proveedorCell = document.createElement('td');
            proveedorCell.textContent = compra.proveedor_nombre || 'N/A';
            row.appendChild(proveedorCell);

            let productoCell = document.createElement('td');
            productoCell.textContent = compra.producto_nombre || 'N/A';
            row.appendChild(productoCell);

            let cantidadCell = document.createElement('td');
            cantidadCell.textContent = compra.cantidad || 'N/A';
            row.appendChild(cantidadCell);

            let subtotalCell = document.createElement('td');
            subtotalCell.textContent = compra.subtotal || 'N/A';
            row.appendChild(subtotalCell);

            comprasTableBody.appendChild(row);
        });
    })
    .catch(error => {
        console.error('Error al cargar las compras:', error);
    });
});