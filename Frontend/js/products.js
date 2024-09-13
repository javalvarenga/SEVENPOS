import { API_URL } from '../utils/constants.js';

/* CARGA INICIAL DE DATOS */
document.addEventListener('DOMContentLoaded', () => {
    // Cargar los datos en la tabla
    fetch(API_URL + 'product/getAll')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#MyTable');
            data.forEach(product => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${product.id_producto}</td>
                    <td>${product.nombre}</td>
                    <td>${product.precio}</td>
                    <td>${product.unidades}</td>
                    <td>
                        <button>Editar</button> 
                        <button class="btn-eliminar" data-id="${product.id_producto}">Eliminar</button>
                    </td>
                `;
                tableBody.appendChild(row);
            });

            // Añadir evento a los botones de eliminar
            document.querySelectorAll('.btn-eliminar').forEach(button => {
                button.addEventListener('click', (event) => {
                    const productId = event.target.getAttribute('data-id');
                    eliminarProducto(productId);
                });
            });

            // Crear el botón "Nuevo Producto" al final de la tabla
            const row = document.createElement('tr');
            row.innerHTML = `
                <td colspan="5" style="text-align: center;">
                    <button id="btn-nuevo-producto">Nuevo Producto</button>
                </td>
            `;
            tableBody.appendChild(row);

            // Añadir evento al botón "Nuevo Producto"
            document.querySelector('#btn-nuevo-producto').addEventListener('click', () => {
                document.querySelector('#modal-nuevo-producto').style.display = 'flex'; // Mostrar el modal
            });

            // Configuración del modal
            const modal = document.querySelector('#modal-nuevo-producto');
            const closeButton = document.querySelector('.close-button');
            
            closeButton.addEventListener('click', () => {
                modal.style.display = 'none'; // Ocultar el modal
            });

            window.addEventListener('click', (event) => {
                if (event.target === modal) {
                    modal.style.display = 'none'; // Ocultar el modal si se hace clic fuera de él
                }
            });

            // Manejo del formulario
            const form = document.querySelector('#form-nuevo-producto');
            form.addEventListener('submit', (event) => {
                event.preventDefault();

                const idProducto = document.querySelector('#id_producto').value;
                const nombre = document.querySelector('#nombre').value;
                const precio = document.querySelector('#precio').value;
                const unidades = document.querySelector('#unidades').value;

                fetch(API_URL + 'product/create', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id_producto: idProducto,
                        nombre: nombre,
                        precio: precio,
                        unidades: unidades
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error al guardar el producto.');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Producto guardado:', data);
                    modal.style.display = 'none'; // Ocultar el modal
                    form.reset(); // Limpiar el formulario
                    location.reload(); // Recargar la página para reflejar los cambios
                })
                .catch(error => console.error('Error:', error));
            });
        })
        .catch(error => console.error('Error:', error));
});

/* FUNCIÓN PARA ELIMINAR PRODUCTO */
function eliminarProducto(id) {
    if (confirm('¿Estás seguro de que deseas eliminar este producto?')) {
        fetch(API_URL + 'product/delete', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id_producto: id })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al eliminar el producto.');
            }
            return response.json();
        })
        .then(data => {
            console.log('Producto eliminado:', data);
            location.reload();
        })
        .catch(error => console.error('Error:', error));
    }
}
