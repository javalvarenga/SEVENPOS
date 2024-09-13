import {
    API_URL
} from '../utils/constants.js';

document.addEventListener('DOMContentLoaded', () => {
    // Cargar los datos en la tabla
    fetch(API_URL + 'supplier/getAll')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#MyTable tbody');
            data.forEach(supplier => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${supplier.id_proveedor}</td>
                    <td>${supplier.nombre}</td>
                    <td>${supplier.direccion}</td>
                    <td>${supplier.telefono}</td>
                `;
                tableBody.appendChild(row);
            });

            // Crear el botón "Nuevo Proveedor" al final de la tabla
            const row = document.createElement('tr');
            row.innerHTML = `
                <td colspan="4" style="text-align: center;">
                    <button id="btn-nuevo-proveedor">Nuevo Proveedor</button>
                </td>
            `;
            tableBody.appendChild(row);

            // Añadir evento al botón "Nuevo Proveedor"
            document.querySelector('#btn-nuevo-proveedor').addEventListener('click', () => {
                document.querySelector('#modal-nuevo-proveedor').style.display = 'flex';
            });

            // Configuración del modal
            const modal = document.querySelector('#modal-nuevo-proveedor');
            const closeButton = document.querySelector('.close-button');
            
            closeButton.addEventListener('click', () => {
                modal.style.display = 'none'; 
            });

            window.addEventListener('click', (event) => {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });

            // Manejo del formulario
            const form = document.querySelector('#form-nuevo-proveedor');
            form.addEventListener('submit', (event) => {
                event.preventDefault();

                const nombre = document.querySelector('#nombre').value;
                const direccion = document.querySelector('#direccion').value;
                const telefono = document.querySelector('#telefono').value;

                fetch(API_URL + 'supplier/create', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        nombre: nombre,
                        direccion: direccion,
                        telefono: telefono
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al guardar el proveedor.');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Proveedor guardado:', data);
                    modal.style.display = 'none';
                    form.reset();
                    location.reload();
                })
                .catch(error => console.error('Error:', error));
            });
        })
        .catch(error => console.error('Error:', error));
});