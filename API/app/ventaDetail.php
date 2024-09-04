<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Venta</title>
</head>
<body>
    <h1>Detalle de Venta</h1>

    <?php if ($venta): ?>
        <p><strong>ID:</strong> <?= htmlspecialchars($venta['id_cliente']) ?></p>
        <p><strong>Fecha:</strong> <?= htmlspecialchars($venta['nombre']) ?></p>
        <p><strong>Nombre:</strong> <?= htmlspecialchars($venta['direccion']) ?></p>
        <p><strong>Total:</strong> <?= htmlspecialchars($venta['telefono']) ?></p>
    <?php else: ?>
        <p>Venta no encontrada.</p>
    <?php endif; ?>

    <a href="ventaList.php">Volver a la lista</a>
</body>
</html>
