<!-- layout.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://kit.fontawesome.com/8e0768cae2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/layout.css">
    <title><?php echo $title ?? 'SEVENPOS'; ?></title>

</head>

<body>
    <button id="menu-toggle">☰ Menú</button>
    <div id="sidebar">
        <a href="/sales">
            <div class="menu-item">
                <i class="fas fa-chart-line"></i> Ventas
            </div>
        </a>
        <a href="/purchases">
            <div class="menu-item">
                <i class="fas fa-shopping-cart"></i> Compras
            </div>
        </a>
        <a href="/inventory">
            <div class="menu-item">
                <i class="fas fa-box"></i> Inventario
            </div>
        </a>
        <a href="/devolutions">
            <div class="menu-item">
                <i class="fas fa-undo"></i> Devoluciones
            </div>
        </a>
        <a href="/customers">
            <div class="menu-item">
                <i class="fas fa-users"></i> Clientes
            </div>
        </a>
        <a href="/suppliers">
            <div class="menu-item">
            <i class="fa-solid fa-user-tie"></i> Proveedores
            </div>
        </a>
        <a href="/receivable">
            <div class="menu-item">
                <i class="fas fa-dollar-sign"></i> Cuentas por Cobrar
            </div>
        </a>
        <a href="/toPay">
            <div class="menu-item">
                <i class="fas fa-money-bill-wave"></i> Cuentas por Pagar
            </div>
        </a>
        <a id="logout">
            <div class="menu-item">
                <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
            </div>
        </a>
    </div>
    <div id="content">
        <!-- Aquí se cargará el contenido específico de cada página -->
        <?php echo $content ?? ''; ?>
    </div>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });

        document.getElementById('logout').addEventListener('click', function() {
            localStorage.removeItem('USER');
            window.location.href = '/login';
        });

    </script>
</body>

</html>