import {
    API_URL
} from '../utils/constants.js';

document.addEventListener('DOMContentLoaded', () => {
    fetch(API_URL + 'Sales/getAll')//,{body}
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#facturasTable tbody');
            data.forEach(factura => {
                const row = document.createElement('tr');
                row.innerHTML = `
                   <td>${factura.id_venta}</td>
                   <td>${factura.fecha}</td>
                   <td>${factura.nombre}</td>
                   <td>${factura.producto}</td>
                   <td>${factura.cantidad}</td>
                   <td>${factura.descuento}</td>
                   <td>${factura.total}</td>
               `;
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error:', error));
});