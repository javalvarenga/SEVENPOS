import {
    API_URL
} from '../utils/constants.js';

document.addEventListener('DOMContentLoaded', function () {
 // Cargar proveedores
 fetch(API_URL + 'Supplier/getAll')
 .then(response => response.json())
    .then(data => {
        let proveedorSelects = document.querySelectorAll('.proveedor_select');
        proveedorSelects.forEach(select => {
            data.forEach(proveedor => {
                let option = document.createElement('option');
                option.value = proveedor.id_proveedor;
                option.textContent = proveedor.nombre;
                select.appendChild(option);
            });
        });
    })
    .catch(error => {
        console.error('Error al cargar los proveedores:', error);
        document.getElementById('result').innerText = 'Error al cargar los proveedores';
    });

    // Cargar productos
    fetch(API_URL + 'Product/getAll')
    .then(response => response.json())
    .then(data => {
        let productoSelects = document.querySelectorAll('.producto_select');
        productoSelects.forEach(select => {
            data.forEach(producto => {
                let option = document.createElement('option');
                option.value = producto.id_producto;
                option.textContent = producto.nombre;
                option.dataset.precio = producto.precio;
                select.appendChild(option);
            });
        });
    })
    .catch(error => {
        console.error('Error al cargar los productos:', error);
        document.getElementById('result').innerText = 'Error al cargar los productos';
    });

    // Agregar productos dinámicamente
    const addProductoButton = document.getElementById('addProducto');
    if (addProductoButton) {
        addProductoButton.addEventListener('click', function() {
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
            cantInput.classList.add('cantidad');
            cantInput.required = true;
            productoDiv.appendChild(cantInput);

            let precioLabel = document.createElement('label');
            precioLabel.textContent = 'Precio:';
            productoDiv.appendChild(precioLabel);

            let precioInput = document.createElement('input');
            precioInput.type = 'number';
            precioInput.name = 'precio';
            precioInput.classList.add('precio');
            precioInput.step = '0.01';
            precioInput.required = true;
            precioInput.readOnly = true;
            productoDiv.appendChild(precioInput);

            let subtotalLabel = document.createElement('label');
            subtotalLabel.textContent = 'Subtotal:';
            productoDiv.appendChild(subtotalLabel);

            let subtotalInput = document.createElement('input');
            subtotalInput.type = 'number';
            subtotalInput.name = 'subtotal';
            subtotalInput.classList.add('subtotal');
            subtotalInput.step = '0.01';
            subtotalInput.required = true;
            subtotalInput.readOnly = true;
            productoDiv.appendChild(subtotalInput);

            document.getElementById('productos').appendChild(productoDiv);

            // Recargar opciones de productos en el nuevo select
            fetch(API_URL + 'Product/getAll')
                .then(response => response.json())
                .then(data => {
                    data.forEach(producto => {
                        let option = document.createElement('option');
                        option.value = producto.id_producto;
                        option.textContent = producto.nombre;
                        option.dataset.precio = producto.precio;
                        select.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error al cargar los productos:', error);
                    document.getElementById('result').innerText = 'Error al cargar los productos';
                });
        });
    }

    // Actualizar precio y subtotal
    document.addEventListener('change', function(event) {
        if (event.target.classList.contains('producto_select')) {
            let select = event.target;
            let productoDiv = select.closest('.producto');
            let selectedOption = select.options[select.selectedIndex];
            let precio = parseFloat(selectedOption.dataset.precio) || 0;
            productoDiv.querySelector('input[name="precio"]').value = precio.toFixed(2);
            calculateSubtotal(productoDiv);
        }
        if (event.target.classList.contains('cantidad')) {
            let productoDiv = event.target.closest('.producto');
            calculateSubtotal(productoDiv);
        }
    });

    // Calcular el subtotal de un producto
    function calculateSubtotal(productoDiv) {
        let cantidad = parseFloat(productoDiv.querySelector('input[name="cantidad"]').value) || 0;
        let precio = parseFloat(productoDiv.querySelector('input[name="precio"]').value) || 0;
        let subtotal = cantidad * precio;
        productoDiv.querySelector('input[name="subtotal"]').value = subtotal.toFixed(2);
    }

    // Envío del formulario
    const purchaseForm = document.getElementById('purchaseForm');
    if (purchaseForm) {
        purchaseForm.addEventListener('submit', function(e) {
            e.preventDefault();

            let formData = {
                id_proveedor: document.getElementById('proveedor_select').value,
                nombre_compra: document.getElementById('nombre_compra').value,
                fecha: document.getElementById('fecha').value,
                detalles: []
            };

            let productos = document.querySelectorAll('.producto');
            productos.forEach(function(producto) {
                let idProducto = producto.querySelector('select[name="id_producto"]').value;
                let cantidad = producto.querySelector('input[name="cantidad"]').value;
                let subtotal = producto.querySelector('input[name="subtotal"]').value;

                formData.detalles.push({
                    id_producto: idProducto,
                    cantidad: cantidad,
                    subtotal: subtotal
                });
            });

            // Enviar datos a través de AJAX
            fetch(API_URL + 'Purchase/Create', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                let resultElement = document.getElementById('result');
                if (resultElement) {
                    resultElement.innerText = 'Compra registrada con éxito.';
                }

                purchaseForm.reset(); 
                document.getElementById('productos').innerHTML = '';
            })
            .catch(error => {
                console.error('Error:', error);
                let resultElement = document.getElementById('result');
                if (resultElement) {
                    resultElement.innerText = 'Error al registrar la compra';
                }
            });
        });
    }
});