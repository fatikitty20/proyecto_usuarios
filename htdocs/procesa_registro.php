<?php
session_start();

// 1. Validar datos del formulario
if (
    !isset($_POST["nombre"]) ||
    !isset($_POST["email"]) ||
    !isset($_POST["password"])
) {
    $errorHtml = "Faltan datos en el formulario.";
    require "includes/error.php";
    return;
}

$nombre = trim($_POST["nombre"]);
$email = trim($_POST["email"]);
$password = trim($_POST["password"]);

// Validar campos vacíos
if ($nombre === "" || $email === "" || $password === "") {
    $errorHtml = "Todos los campos son obligatorios.";
    require "includes/error.php";
    return;
}

// 2. Conectar con la BD (estilo del profe)
require_once __DIR__ . "/db/Bd.php";


try {

    $bd = Bd::pdo();

    // Encriptar contraseña
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    // 3. Insertar usuario
    $stmt = $bd->prepare("
        INSERT INTO usuarios (nombre, email, password)
        VALUES (:nombre, :email, :password)
    ");

    $stmt->execute([
        ":nombre" => $nombre,
        ":email" => $email,
        ":password" => $passwordHash
    ]);

    // 4. Redirigir al login (como hace el profe)
    header("Location: login.php");
    return;

} catch (Exception $e) {

    // Mostrar error usando plantilla del profe
    $errorHtml = htmlentities($e->getMessage());
require "db/error.php";
}
