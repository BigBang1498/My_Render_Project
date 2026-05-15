<?php
require_once '../config/db.php';

$id   = (int) ($_GET['id'] ?? 0);
$stmt = $pdo->prepare("DELETE FROM productos WHERE id = ?");
$stmt->execute([$id]);

header('Location: listar.php');
exit;