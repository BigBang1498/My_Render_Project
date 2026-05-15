<?php
require_once '../config/db.php';

$id   = (int) ($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
$stmt->execute([$id]);
$p = $stmt->fetch();

if (!$p) { die("Producto no encontrado."); }
?>

<h2>Detalle del Producto</h2>
<p><strong>ID:</strong> <?= $p['id'] ?></p>
<p><strong>Nombre:</strong> <?= htmlspecialchars($p['nombre']) ?></p>
<p><strong>Precio:</strong> $<?= number_format($p['precio'], 2) ?></p>
<p><strong>Stock:</strong> <?= $p['stock'] ?></p>
<p><strong>Creado:</strong> <?= $p['creado_en'] ?></p>

<a href="editar.php?id=<?= $p['id'] ?>">Editar</a> |
<a href="listar.php">Volver</a>