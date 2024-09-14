import { API_URL } from '../utils/constants.js';

/* CARGA PARA LOS DATOS DE LOS CLIENTES */
document.addEventListener('DOMContentLoaded', () => {
    // Cargar los datos HACIA LA tabla
    fetch(API_URL + 'Customer/getAll')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#Tabla1 tbody');
            data.forEach(cliente => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${cliente.id_cliente}</td>
                    <td>${cliente.nombre}</td>
                    <td>${cliente.direccion}</td>
                    <td>${cliente.telefono}</td>
                    <td>${cliente.correo}</td>
                    <td>${cliente.nit}</td>
                    <td>${cliente.CUI}</td>
                `;
                tableBody.appendChild(row);
            });
        })
        .catch(error => console.error('Error:', error));

    // Configuración del modal
    const modal = document.querySelector('#modal-cargar-solicitud');
    const openModalButton = document.querySelector('#btn-cargar-solicitud');
    const closeButton = document.querySelector('.close-button');

    // Mostrar el modal
    if (openModalButton) {
        openModalButton.addEventListener('click', () => {
            modal.style.display = 'flex'; // Mostrar el modal
        });
    }

    // Ocultar el modal
    if (closeButton) {
        closeButton.addEventListener('click', () => {
            modal.style.display = 'none'; // Ocultar el modal
        });
    }

    // Ocultar el modal si se hace clic fuera de él
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

    // Manejador de envío del formulario para mostrar el historial de compras
    const form = document.querySelector('#form-cargar-solicitud');
    form.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevenir el comportamiento por defecto del formulario
        const clienteId = document.querySelector('#cliente-id').value;
        mostrarHistorial(clienteId);
    });
});

/* FUNCIONES PARA MOSTRAR EL HISTORIAL DE COMPRAS DEL CLIENTE */
function mostrarHistorial(id) {
    fetch(API_URL + `Customer/getHistorialid?id=${id}`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        },
    })
    .then(response => response.json())
    .then(data => { console.log(data);
        const historialContainer = document.querySelector('#historial-container');
        historialContainer.innerHTML = ''; // Limpiar el contenedor

        if (data.length === 0) {
            historialContainer.innerHTML = '<p>No se encontraron compras para este cliente.</p>';
            return;
        }

        const table = document.createElement('table');
        table.innerHTML = `
            <thead>
                <tr>
                    <th>ID cliente</th>
                    <th>Nombre</th>
                    <th>ID_venta</th>
                    <th>Fecha</th>
                    <th>ID_producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                ${data.map(compra => `
                    <tr>
                        <td>${compra.id_cliente}</td>
                        <td>${compra.nombre}</td>
                        <td>${compra.id_venta}</td>
                        <td>${compra.fecha}</td>
                        <td>${compra.id_producto}</td>
                        <td>${compra.cantidad}</td>
                        <td>${compra.precio}</td>
                        <td>${compra.TotalPrice}</td>
                    </tr>
                `).join('')}
            </tbody>
        `;
        historialContainer.appendChild(table);
    })
    .catch(error => console.error('Error:', error));
}