import {
    API_URL
} from '../utils/constants.js';

document.addEventListener('DOMContentLoaded', function() {
    fetch(API_URL + 'Sales/getProducts')
        .then(response => response.json())
        .then(data => {
            let productoSelects = document.querySelectorAll('.producto_select');

            // Llenar los selects con los productos obtenidos
            productoSelects.forEach(select => {
                data.forEach(producto => {
                    let option = document.createElement('option');
                    option.value = producto.id_producto;
                    option.textContent = producto.nombre;
                    select.appendChild(option);
                });
            });
        })
        .catch(error => console.error('Error al cargar los productos:', error));
});

// Agregar más campos de productos dinámicamente
document.getElementById('addProducto').addEventListener('click', function() {
    let productoDiv = document.createElement('div');
    productoDiv.classList.add('producto');

    let selectLabel = document.createElement('label');
    selectLabel.textContent = 'Producto:';
    productoDiv.appendChild(selectLabel);

    let select = document.createElement('select');
    select.name = 'id_producto';
    select.classList.add('producto_select');
    select.required = true;
    productoDiv.appendChild(select);

    let optionDefault = document.createElement('option');
    optionDefault.value = '';
    optionDefault.textContent = 'Seleccione un producto';
    select.appendChild(optionDefault);

    let cantLabel = document.createElement('label');
    cantLabel.textContent = 'Cantidad:';
    productoDiv.appendChild(cantLabel);

    let cantInput = document.createElement('input');
    cantInput.type = 'number';
    cantInput.name = 'cantidad';
    cantInput.required = true;
    productoDiv.appendChild(cantInput);

    document.getElementById('productos').appendChild(productoDiv);

    // Recargar las opciones de productos en el nuevo select
    fetch('http://localhost:8000/Sales/getProducts')
        .then(response => response.json())
        .then(data => {
            data.forEach(producto => {
                let option = document.createElement('option');
                option.value = producto.id_producto;
                option.textContent = producto.nombre;
                select.appendChild(option);
            });
        })
        .catch(error => console.error('Error al cargar los productos:', error));
});

// Manejo del envío del formulario
document.getElementById('ventaForm').addEventListener('submit', function(e) {
    e.preventDefault();  // Evitar el envío tradicional
    //const user = localStorage.getItem('USER');
    let formData = {
        nombre: document.getElementById('nombre').value,
        direccion: document.getElementById('direccion').value,
        telefono: document.getElementById('telefono').value,
        correo: document.getElementById('correo').value,
        nit: document.getElementById('nit').value,
        cui: document.getElementById('cui').value,
        id_empleado: 1,
        tipo_pago: document.getElementById('tipo_pago').value,
        descuento: document.getElementById('descuento').value,
        detalles: []
    };

    let productos = document.querySelectorAll('.producto');
    productos.forEach(function(producto) {
        let idProducto = producto.querySelector('select[name="id_producto"]').value;
        let cantidad = producto.querySelector('input[name="cantidad"]').value;

        formData.detalles.push({
            id_producto: idProducto,
            cantidad: cantidad
        });
    });

    // Enviar los datos a través de AJAX
    fetch('http://localhost:8000/Sales/create', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(formData)
    })
    .then(response => response.json())
    .then(data => {
        //document.getElementById('result').innerText = JSON.stringify(data);
        alert("La venta se ha realizado con exito. \nVenta: "+  data.Venta);
    })
    .catch(error => console.error('Error:', error));
});