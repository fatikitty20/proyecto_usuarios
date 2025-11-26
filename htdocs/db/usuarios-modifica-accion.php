<?php
require_once __DIR__ . '/Bd.php';
require_once __DIR__ . '/recuperaIdEntero.php';
require_once __DIR__ . '/recuperaTexto.php';
require __DIR__ . "/../includes/solo_admin.php";
try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Error("Solicitud inválida.");
    }

    $id = recuperaIdEntero('id');
    $nombre = recuperaTexto('nombre');
    $email = recuperaTexto('email');

    $pdo = Bd::pdo();

    $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email AND id != :id LIMIT 1");
    $stmt->execute([':email' => $email, ':id' => $id]);

    if ($stmt->fetch(PDO::FETCH_ASSOC)) {
        throw new Error("El email ya está siendo usado por otro usuario.");
    }

    $stmt = $pdo->prepare("
        UPDATE usuarios
        SET nombre = :nombre, email = :email
        WHERE id = :id
    ");

    $stmt->execute([
        ':nombre' => $nombre,
        ':email'  => $email,
        ':id'     => $id
    ]);

    header("Location: ../usuarios-lista.php");
    exit;

} catch (Throwable $e) {
    $errorHtml = htmlspecialchars($e->getMessage());
    require __DIR__ . '/../includes/error.php';
    exit;
}
