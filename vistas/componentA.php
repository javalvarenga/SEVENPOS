<div class="component-a">
    <h1>Registrar Venta</h1>
    <div class="container-fluid">
        <div class="col-md-12 mb-3">
            <div class="form-group mb-2">
                <label class="col-form-label" for="inputCodigoProducto">
                    <i class="fas fa-barcode fs-6"></i>
                    <span class="small">Productos</span>
                </label>

                <input type="text"  class="form-control form-control-sm"
                    id="inputCodigoProducto" placeholder="Buscar Producto">
            </div>
        </div>   
        <div class="col-md-6 mb-3">
            <h3>Total Ventas: s./ <span id="totalVentas">0.00</span></h3>
        </div>
        <div class="col-md-6 text-rigth">
            <button class="btn btn-primary" id="btnIniciarVenta">
                Realizar Venta 
            </button>
            <button class="btn btn-danger" id="btnVaciarListado">
                </i>Vaciar LIstado
            </button>
        </div>
        <div class="col-md-9">
            <table id="listaProductos" class="display nowrap table-striped w-100 shadow">
                <thead class="bg-info text-left fs-6">
                    <tr>
                        <th>Item</th>
                        <th>Codigo</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>total</th>
                    </tr>
                </thead>
                <tbody class="small text-left fs-6">

                </tbody>
            </table>
        </div>
        <div class="col-md-3">
            <div class="card shadow">
                <h5 class="card-header py-1 bg-secondary text-white text-center">
                    Total ventas: <span id="TotalVentarRegistrar">0.00</span>
                </h5>
                <div class="card-body py-2">
                    <div class="form-group mb-2">
                        <label class="col-form-label" for="categoria">
                            <span class="small">Documento</span>
                            <span class="text-danger">''</span>
                        </label>
                        <select class="form-select form-select-sm" name="tipoDocumento" id="tipoDocumento">
                            <option value="0" selected="true">Factura</option>
                            <option value="1">Boleta</option>
                        </select>
                        <span id="validate-categoria" class="text-danger small fst-italic" style="display:none">
                            Debe seleccionar tipo de documento
                        </span>
                    </div>     
                    
                    <div class="form-group mb-2">
                        <label class="col-form-label" for="tipoPago">
                            <span class="small">Tipo de pago</span>
                            <span class="text-danger">''</span>
                        </label>
                        <select class="form-select form-select-sm" name="tipoPago" id="tipoPago">
                            <option value="0" selected="true">Efectivo</option>
                            <option value="1">Tarjeta</option>
                        </select>
                        <span id="validate-categoria" class="text-danger small fst-italic" style="display:none">
                            Debe seleccionar tipo de documento
                        </span>
                    </div>   

                    <div class="form-group">
                        <label for="efectivoRecibido">Efectivo recibido</label>
                        <input type="number" min="0" name="efectivoRecibido" id="efectivoRecibido"
                        class="form-control form-control-sm" placeholder="Cantidad Recibida" >
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="" id="efectivoExacto">
                        <label for="efectivoExacto" class="form-check-label" ></label>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12">
                            <h6 class="text-start fw-bold">Monto efectivo 
                                <span id="efectivoEntregado">0.00</span>
                            </h6>
                        </div>
                        <div class="col-12">
                            <h6 class="text-start text-danger fw-bold">Monto efectivo 
                                <span id="vuelto">0.00</span>
                            </h6>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-7">
                            <span>Subtotal</span>
                        </div>
                        <div class="col-md-5 text-right">Q 
                            <span id="subTotal">0.00</span>
                        </div>

                        <div class="col-md-7">
                            <span>IVA (5%)</span>
                        </div>
                        <div class="col-md-5 text-right">Q 
                            <span id="iva">0.00</span>
                        </div>
                        
                        <div class="col-md-7">
                            <span>Total</span>
                        </div>
                        <div class="col-md-5 text-right">Q 
                            <span id="total">0.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
