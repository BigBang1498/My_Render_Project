<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once '../config/db.php';

$stmt = $pdo->query("SELECT * FROM productos ORDER BY id ASC");
$productos = $stmt->fetchAll();
?>

<h2>Lista de Productos</h2>
<a href="crear.php">+ Agregar producto</a>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $p): ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= htmlspecialchars($p['nombre']) ?></td>
            <td>$<?= number_format($p['precio'], 2) ?></td>
            <td><?= $p['stock'] ?></td>
            <td>
                <a href="detalle.php?id=<?= $p['id'] ?>">Ver</a> |
                <a href="editar.php?id=<?= $p['id'] ?>">Editar</a> |
                <a href="eliminar.php?id=<?= $p['id'] ?>"
                   onclick="return confirm('¿Eliminar este producto?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>