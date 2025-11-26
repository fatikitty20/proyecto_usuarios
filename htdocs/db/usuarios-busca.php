<?php
require_once __DIR__ . '/Bd.php';
require_once __DIR__ . '/recuperaIdEntero.php';

try {
    $id = recuperaIdEntero('id');

    $pdo = Bd::pdo();

    $stmt = $pdo->prepare('SELECT id, nombre, email FROM usuarios WHERE id = :id');
    $stmt->execute([':id' => $id]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        throw new Error('Usuario no encontrado.');
    }

    $nombre = htmlspecialchars($usuario['nombre']);
    $email = htmlspecialchars($usuario['email']);

} catch (Throwable $e) {
    $errorHtml = htmlspecialchars($e->getMessage());
    require __DIR__ . '/../includes/error.php';
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Detalle de usuario</title>
    <link rel="stylesheet" href="/includes/estilos.css">
</head>

<body>

<?php require __DIR__ . '/../includes/header.php'; ?>

<main>
    <h1>Detalle del usuario</h1>

    <p><strong>Nombre:</strong> <?= $nombre ?></p>
    <p><strong>Email:</strong> <?= $email ?></p>

    <p>
        <a href="modifica.php?id=<?= $id ?>">Editar</a> |
        <a href="usuarios-elimina.php?id=<?= $id ?>">Eliminar</a>
    </p>

    <p><a href="../usuarios-lista.php">Volver a lista</a></p>

</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>

</body>
</html>
