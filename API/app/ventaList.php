<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Ventas</title>
</head>
<body>
    <h1>Lista de Ventas</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Nombre</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($ventas as $venta): ?>
        <tr>
            <td><?= htmlspecialchars($venta['id_cliente']) ?></td>
            <td><?= htmlspecialchars($venta['nombre']) ?></td>
            <td><?= htmlspecialchars($venta['direccion']) ?></td>
            <td><?= htmlspecialchars($venta['telefono']) ?></td>
            <td><a href="ventaDetail.php?id=<?= $venta['id'] ?>">Ver Detalle</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
