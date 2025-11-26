<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width">
 <title>Registrar usuario</title>
 <link rel="stylesheet" href="includes/estilos.css">
</head>

<body>

 <?php require __DIR__ . "/includes/header.php"; ?>

 <main>

  <h1>Registrar usuario</h1>

  <form action="registrar_usuario.php" method="post">

   <p>
    <label>
     Nombre
     <input type="text" name="nombre" required>
    </label>
   </p>

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
     Registrar
    </button>
   </p>

   <!-- registro.php (fragmento del <form>) -->
    <p>
        <label>
    Administrador
    <input type="checkbox" name="es_admin" value="1">
        </label>
    </p>


  </form>

 </main>

 <?php require __DIR__ . "/includes/footer.php"; ?>

</body>
</html>
