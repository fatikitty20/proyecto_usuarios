<?php
require __DIR__ . '/../includes/solo_admin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="/includes/estilos.css">
 <title>Agregar usuario</title>
</head>

<body>

 <form action="usuarios-agrega-accion.php" method="post">

  <h1>Agregar usuario</h1>

<a href="../panel.php">Cancelar</a>


  <p>
   <label>
    Nombre *
    <input name="nombre" required>
   </label>
  </p>

  <p>
   <label>
    Email *
    <input name="email" type="email" required>
   </label>
  </p>

  <p>
   <label>
    Contraseña *
    <input name="password" type="password" required>
   </label>
  </p>
  
  <p>
    <label>
        Administrador
        <input type="checkbox" name="es_admin" value="1">
    </label>
</p>


  <p>* Obligatorio</p>

  <p><button type="submit">Agregar</button></p>

 </form>

</body>
</html>
