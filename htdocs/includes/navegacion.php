<?php
// includes/navegacion.php
?>

<ul>
    <?php if (!isset($_SESSION["usuario"])) { ?>

        <li><a href="index.php">Inicio</a></li>
        <li><a href="registro.php">Registrar usuario</a></li>
        <li><a href="login.php">Iniciar sesión</a></li>

    <?php } else { ?>

        <li><a href="panel.php">Panel</a></li>
        <li><a href="usuarios-lista.php">Usuarios</a></li>
        <li><a href="logout.php">Cerrar sesión</a></li>

    <?php } ?>

    <?php if (isset($_SESSION['es_admin']) && $_SESSION['es_admin'] == 1): ?>
        <li><a href="usuarios-lista.php">Administrar usuarios</a></li>
    <?php endif; ?>
</ul>
