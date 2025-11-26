<?php
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Error</title>
    <link rel="stylesheet" href="includes/estilos.css">
</head>

<body>

<?php require __DIR__ . '/includes/header.php'; ?>

<main>
    <h1>Error</h1>

    <p><?= $errorHtml ?></p>
</main>

<?php require __DIR__ . '/includes/footer.php'; ?>

</body>
</html>
