<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="includes/estilos.css">
</head>

<body>

    <?php require __DIR__ . "/includes/header.php"; ?>

    <main>

        <h1>Iniciar sesión</h1>

        <form action="procesa_login.php" method="post">

            <p>
                <label>
                    Correo electrónico
                    <input type="email" name="email" required>
                </label>
            </p>

            <p>
                <label>
                    Contraseña
                    <input type="password" name="password" required>
                </label>
            </p>

            <p>
                <button type="submit">
                    Iniciar sesión
                </button>
            </p>

        </form>

    </main>

    <?php require __DIR__ . "/includes/footer.php"; ?>

</body>

</html>
