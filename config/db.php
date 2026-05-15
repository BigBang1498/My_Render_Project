<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// config/db.php

$host     = 'dpg-d831mnf2gups73ejfh20-a.oregon-postgres.render.com';  
$port     = '5432';
$dbname   = 'render_proyect';
$user     = 'postgres';
$password = 'nueva_contraseña';

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}