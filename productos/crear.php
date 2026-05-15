<?php
require_once '../config/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $precio = (float) ($_POST['precio'] ?? 0);
    $stock  = (int)   ($_POST['stock']  ?? 0);

    if ($nombre === '') {
        $error = 'El nombre es obligatorio.';
    } else {
        $stmt = $pdo->prepare(
            "INSERT INTO productos (nombre, precio, stock) VALUES (?, ?, ?)"
        );
        $stmt->execute([$nombre, $precio, $stock]);
        header('Location: listar.php');
        exit;
    }
}
?>

<h2>Agregar Producto</h2>

<?php if ($error): ?>
    <p style="color:red;"><?= $error ?></p>
<?php endif; ?>

<form method="POST">
    <label>Nombre: <input type="text" name="nombre" required></label><br><br>
    <label>Precio: <input type="number" step="0.01" name="precio" required></label><br><br>
    <label>Stock:  <input type="number" name="stock" required></label><br><br>
    <button type="submit">Guardar</button>
    <a href="listar.php">Cancelar</a>
</form>
