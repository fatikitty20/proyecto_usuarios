<?php
require_once __DIR__ . '/db/Bd.php';
require __DIR__ . '/includes/solo_admin.php';


try {

    $bd = Bd::pdo();

    $stmt = $bd->prepare("
        SELECT id, nombre, email
        FROM usuarios
        ORDER BY nombre
    ");
    $stmt->execute();

    $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $render = "";

    foreach ($lista as $row) {

        $id = urlencode($row["id"]);
        $nombre = htmlentities($row["nombre"]);
        $email = htmlentities($row["email"]);

        $render .= "
        <li>
            <p>
                <a href='db/usuarios-busca.php?id=$id'>
                    $nombre
                </a>
                — $email
            </p>

            <p>
                <a href='db/modifica.php?id=$id'>Editar</a> |
                <a href='db/usuarios-elimina.php?id=$id'>Eliminar</a>
            </p>
        </li>
        ";
    }

} catch (Exception $e) {

    $errorHtml = htmlentities($e->getMessage());
    require __DIR__ . "/includes/error.php";
    return;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Usuarios registrados</title>
    <link rel="stylesheet" href="includes/estilos.css">
</head>

<body>

    <?php require __DIR__ . "/includes/header.php"; ?>

    <main>

        <h1>Usuarios registrados</h1>

        <p><a href="db/usuarios-agrega.php">Agregar usuario</a></p>

        <ul><?= $render ?></ul>

    </main>

    <?php require __DIR__ . "/includes/footer.php"; ?>

</body>
</html>
