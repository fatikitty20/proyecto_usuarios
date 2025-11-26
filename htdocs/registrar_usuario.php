<?php
// ejemplo: registrar_usuario.php o db/usuarios-agrega-accion.php (fragmento)
require_once __DIR__ . '/db/Bd.php'; // o el require correcto según ubicación
require_once __DIR__ . '/db/recuperaTexto.php'; // si usas tus validadores

try {
    // nombre/email/password ya los validas con recuperaTexto si quieres
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $email  = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if ($nombre === '' || $email === '' || $password === '') {
        throw new Exception('Completa todos los campos.');
    }

    // checkbox admin: si está marcado vale "1", si no => 0
    $es_admin = isset($_POST['es_admin']) && $_POST['es_admin'] == '1' ? 1 : 0;

    $pdo = Bd::pdo();

    // insertar (hash de password)
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("
        INSERT INTO usuarios (nombre, email, password, es_admin)
        VALUES (:nombre, :email, :password, :es_admin)
    ");
    $stmt->execute([
        ':nombre' => $nombre,
        ':email'  => $email,
        ':password' => $hash,
        ':es_admin' => $es_admin
    ]);

    // redirigir al login o lista segun tu flujo
    header('Location: login.php?msg=registrado');
    exit;

} catch (Throwable $e) {
    // mostrar error con la plantilla del profe
    $errorHtml = htmlspecialchars($e->getMessage());
    require __DIR__ . '/error.php'; // o la ruta correcta
    exit;
}
