<?php
require_once '../config/db.php';

$id   = (int) ($_GET['id'] ?? $_POST['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM productos WHERE id = ?");
$stmt->execute([$id]);
$p = $stmt->fetch();

if (!$p) { die("Producto no encontrado."); }

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $precio = (float) ($_POST['precio'] ?? 0);
    $stock  = (int)   ($_POST['stock']  ?? 0);

    if ($nombre === '') {
        $error = 'El nombre es obligatorio.';
    } else {
        $stmt = $pdo->prepare(
            "UPDATE productos SET nombre = ?, precio = ?, stock = ? WHERE id = ?"
        );
        $stmt->execute([$nombre, $precio, $stock, $id]);
        header('Location: listar.php');
        exit;
    }
}
?>

<h2>Editar Producto</h2>

<?php if ($error): ?>
    <p style="color:red;"><?= $error ?></p>
<?php endif; ?>

<form method="POST">
    <input type="hidden" name="id" value="<?= $p['id'] ?>">

    <label>Nombre:
        <input type="text" name="nombre" value="<?= htmlspecialchars($p['nombre']) ?>" required>
    </label><br><br>

    <label>Precio:
        <input type="number" step="0.01" name="precio" value="<?= $p['precio'] ?>" required>
    </label><br><br>

    <label>Stock:
        <input type="number" name="stock" value="<?= $p['stock'] ?>" required>
    </label><br><br>

    <button type="submit">Actualizar</button>
    <a href="listar.php">Cancelar</a>
</form>