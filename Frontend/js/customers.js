import {
    API_URL
} from '../utils/constants.js';



/* CARGA INICIAL DE DATOS */
document.addEventListener('DOMContentLoaded', () => {
    fetch(API_URL + 'customer/getAll')//,{body}
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

