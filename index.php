<!DOCTYPE html>
<head>
    <title >Punto de Venta</title>
    <link rel="stylesheet" href="./css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-md d-flex justify-content-between bg-dark p-4">
        <h1 class="h1 text-lg-start text-light ">Punto de venta</h1>
        <img class="img_header" src="./assets/images/carrito_compras.png" alt="carrito de compras" style="width: 120px;  height: 100px;">
    </nav>
    <div class="d-flex">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark mt-1" style="width: 280px;  height: 100vh;">
            <ul class="snav nav-pills flex-column mb-auto">
                <li class="nav-link">
                    <a class="nav-link active" href="./login.php">Inicio</a>
                </li>
                <li class="nav-link"><a class="nav-link" href="">Productos</a></li>
                <li class="nav-link"><a class="nav-link" href="">Proveedores</a></li>
                <li class="nav-link"><a class="nav-link" href="">Clientes</a></li>
                <li class="nav-link"><a class="nav-link" href="">Facturas</a></li>
            </ul>
        </div>
        <div class="container p-3 mx-auto">
            <form method="POST" action="" class="d-flex flex-wrap p-2">
                <button button type="submit" name="component" value="componentA" class="col-md-4 card text-center m-3 bg-primary h5 text-white text-decoration-none" href="./vistas/registrar_venta.php" style="max-width: 250px; height: auto;">
                    <img class="card-img-top img-fluid mx-auto" src="./assets/images/carrito.png" alt="Carrito de ventas" style="max-width: 100px; height: auto;">
                    Registrar venta
                </button>

                <a class="col-md-4 card text-center m-3 bg-success bg-gradient h5 text-white text-decoration-none"  href="./vistas/form_productos.php" style="max-width: 250px; height: auto;" >
                    <img class="card-img-top img-fluid mx-auto" src="./assets/images/carrito.png" alt="Carrito de ventas" style="max-width: 100px; height: auto;">
                    <h5 class="card-title mt-2">Ingresar Producto</h5>
                </a>
                <a class="col-md-4 card text-center m-3 bg-info bg-gradient h5 text-white text-decoration-none" href="./vistas/tabla_productos.php" style="max-width: 250px; height: auto;">
                    <img class="card-img-top img-fluid mx-auto" src="./assets/images/carrito.png" alt="Carrito de ventas" style="max-width: 100px; height: auto;">
                    <h5 class="card-title mt-2">Reporte de Ventas</h5>
                </a>
                <a class="col-md-4 card text-center m-3 bg-danger h5 text-white text-decoration-none" style="max-width: 250px; height: auto;">
                    <img class="card-img-top img-fluid mx-auto" src="./assets/images/carrito.png" alt="Carrito de ventas" style="max-width: 100px; height: auto;">
                    <h5 class="card-title mt-2">Registrar Cliente</h5>
                </a>
                <a class="col-md-4 card text-center m-3 bg-warning bg-gradient h5 text-white text-decoration-none" style="max-width: 250px; height: auto;">
                    <img class="card-img-top img-fluid mx-auto" src="./assets/images/carrito.png" alt="Carrito de ventas" style="max-width: 100px; height: auto;">
                    <h5 class="card-title mt-2">Registrar Empleado</h5>    
                </a>
                <a class="col-md-4 card text-center m-3 bg-secondary h5 text-white text-decoration-none" style="max-width: 250px; height: auto;">
                    <img class="card-img-top img-fluid mx-auto" src="./assets/images/carrito.png" alt="Carrito de ventas" style="max-width: 100px; height: auto;">
                    <h5 class="card-title mt-2">Registrar venta</h5>    
                </a>
            </form>

            <div class="container p-3 bg-secondary">
                <?php
                require_once __DIR__ . '/funciones/ComponentControler.php';
                $controller = new ComponentController();
                $controller->handleRequest();
                ?>
            </div>
        </div>

    </div>   


    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>