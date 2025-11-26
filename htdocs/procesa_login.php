<?php
session_start();

require_once __DIR__ . "/db/Bd.php";
require_once __DIR__ . "/db/recuperaTexto.php";

try {

    $email = recuperaTexto("email");
    $password = recuperaTexto("password");

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Email inválido.");
    }

    $pdo = Bd::pdo();

    $stmt = $pdo->prepare("
        SELECT id, nombre, email, password, es_admin
        FROM usuarios
        WHERE email = :email
        LIMIT 1
    ");
    $stmt->execute([":email" => $email]);

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        throw new Exception("El usuario no existe.");
    }

    if (!password_verify($password, $usuario["password"])) {
        throw new Exception("Contraseña incorrecta.");
    }

    // ======== IMPORTANTE: AQUÍ SE CORRIGE TODO ========
    $_SESSION["usuario"] = [
        "id"       => $usuario["id"],
        "nombre"   => $usuario["nombre"],
        "email"    => $usuario["email"],
        "es_admin" => intval($usuario["es_admin"])
    ];

    header("Location: panel.php");
    exit;

} catch (Exception $e) {

    $errorHtml = htmlentities($e->getMessage());
    require __DIR__ . "/error.php";
    exit;
}
