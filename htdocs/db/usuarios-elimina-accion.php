<?php
require_once __DIR__ . '/Bd.php';
require_once __DIR__ . '/recuperaIdEntero.php';
require __DIR__ . "/../includes/solo_admin.php";

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Error('Solicitud inválida.');
    }

    $id = recuperaIdEntero('id');

    $pdo = Bd::pdo();

    $stmt = $pdo->prepare('DELETE FROM usuarios WHERE id = :id');
    $stmt->execute([':id' => $id]);

    header('Location: ../usuarios-lista.php');
    exit;

} catch (Throwable $e) {
    $errorHtml = htmlspecialchars($e->getMessage());
    require __DIR__ . '/../includes/error.php';
    exit;
}
