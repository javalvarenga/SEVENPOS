<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
</head>
<body>
    <h1>Lsita de productos</h1>

    <?php if ($product): ?>
        <p><strong>ID:</strong> <?= htmlspecialchars($venta['id_producto']) ?></p>
        <p><strong>Nombre:</strong> <?= htmlspecialchars($venta['nombre']) ?></p>
        <p><strong>Precio:</strong> <?= htmlspecialchars($venta['precio']) ?></p>
        <p><strong>Unidades:</strong> <?= htmlspecialchars($venta['unidades']) ?></p>
    <?php else: ?>
        <p>Producto no encontrado.</p>
    <?php endif; ?>

    <a href="productdetail.php">Volver a la lista</a>
</body>
</html>
