<?php
include "Bd.php";

$conexion->exec("
CREATE TABLE IF NOT EXISTS usuarios(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nombre TEXT NOT NULL,
    correo TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
)
");

echo "<h2>Base de datos creada correctamente</h2>";
?>
