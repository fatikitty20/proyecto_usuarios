<?php
session_start();

// Si no hay usuario logueado, redirigir
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    return;
}

$usuario = $_SESSION["usuario"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Panel de usuario</title>
    <link rel="stylesheet" href="includes/estilos.css">
</head>

<body>

    <?php require __DIR__ . "/includes/header.php"; ?>

    <main>

        <h1>Panel de usuario</h1>

        <p>
            Bienvenido, <strong><?php echo htmlentities($usuario["nombre"]); ?></strong>.
        </p>

        <p>
            Tu correo registrado es:
            <strong><?php echo htmlentities($usuario["email"]); ?></strong>
        </p>

        <p>
            Desde este panel podrás acceder a las funciones principales del sistema.
        </p>

        <p>
            <a href="logout.php">Cerrar sesión</a>
        </p>

    </main>

    <?php require __DIR__ . "/includes/footer.php"; ?>

</body>
</html>
