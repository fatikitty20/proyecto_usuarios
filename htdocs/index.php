<!DOCTYPE html>
<html lang="es">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width">
 <title>Proyecto Usuarios</title>

 <!-- Enlace correcto al CSS -->
 <link rel="stylesheet" href="includes/estilos.css">
</head>

<body>

 <?php require __DIR__ . "/includes/header.php"; ?>

 <main>

  <h1>Bienvenido al Proyecto de Usuarios</h1>

  <p>
   Este sistema permite registrar, listar,
   modificar y eliminar usuarios utilizando
   prácticas similares a las vistas en clase:
   uso de componentes, consultas con PDO,
   navegación dinámica y manejo básico de sesiones.
  </p>

  <p>
   Usa la navegación superior para acceder
   a las diferentes funciones del sistema.
  </p>

 </main>

 <?php require __DIR__ . "/includes/footer.php"; ?>

</body>
</html>
