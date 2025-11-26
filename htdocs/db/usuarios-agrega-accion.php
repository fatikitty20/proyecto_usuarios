<?php
require_once "Bd.php";
require_once "recuperaTexto.php";

try {
    $nombre = recuperaTexto("nombre");
    $email = recuperaTexto("email");
    $password = recuperaTexto("password");

    if (strlen($nombre) < 1) {
        throw new Exception("El nombre es obligatorio.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Email inválido.");
    }

    if (strlen($password) < 3) {
        throw new Exception("La contraseña debe tener al menos 3 caracteres.");
    }

    $pdo = Bd::pdo();

    $check = $pdo->prepare("SELECT id FROM usuarios WHERE email = ?");
    $check->execute([$email]);

    if ($check->fetch()) {
        throw new Exception("El correo ya está registrado.");
    }

    $es_admin = isset($_POST['es_admin']) ? 1 : 0;

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("
        INSERT INTO usuarios (nombre, email, password, es_admin)
        VALUES (:nombre, :email, :password, :es_admin)
    ");

    $stmt->execute([
        ':nombre'   => $nombre,
        ':email'    => $email,
        ':password' => $passwordHash,
        ':es_admin' => $es_admin
    ]);

    header("location: ../usuarios-lista.php");
    exit;

} catch (Exception $error) {

    $errorHtml = htmlentities($error->getMessage());
    require __DIR__ . "/../error.php";
    exit;
}
