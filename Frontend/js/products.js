import {
    API_URL
} from '../utils/constants.js';



/* CARGA INICIAL DE DATOS */
document.addEventListener('DOMContentLoaded', () => {
    fetch(API_URL + 'product/getAll')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#MyTable tbody');
            data.forEach(product => {
                const row = document.createElement('tr');
                row.innerHTML = `
                   <td>${product.id_producto}</td>
                   <td>${product.nombre}</td>
                   <td>${product.precio}</td>
                   <td>${product.unidades}</td>
               `;
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error:', error));
});
